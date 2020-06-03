<?php

namespace App\Traits;

use App\Exceptions\SettingNotFound;
use App\Setting;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Cache;

trait HasSettings {

    /**
     * Relationship: Company Settings
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function settings()
    {
        return $this->belongsToMany(Setting::class, 'company_settings')->withPivot(['value']);
    }

    /**
     * Set values for all settings for the Company
     *
     * @param array $settings
     */
    public function setSettings(array $settings)
    {
        $settings2 = [];
        foreach ($settings as $code => $value) {
            if (is_null($setting = Setting::query()->where('code', $code)->first())) {
                continue;
            }

            $settings2[$setting->id] = ['value' => $value];
        }

        $this->settings()->sync($settings2);

        Cache::forget("settings.company-{$this->id}");
    }

    /**
     * Get values for all settings for the Company
     *
     * @return \Illuminate\Support\Collection
     */
    public function getSettings()
    {
        return Cache::rememberForever("settings.company-{$this->id}", function () {
            return tap(collect(), function (&$settings) {
                $companySettings = $this->settings()->get();

                Setting::all()->merge($companySettings)->each(function ($setting) use (&$settings) {
                    $setting->value = $setting->pivot->value ?? null;

                    $settings[$setting->code] = $setting;
                });

                return $settings;
            });
        });
    }

    /**
     * Set setting's value for the Company
     *
     * @param $code
     * @param $value
     *
     * @throws SettingNotFound
     */
    public function setSetting($code, $value)
    {
        try {
            $setting = Setting::query()->where('code', $code)->firstOrFail();
        } catch (ModelNotFoundException $e) {
            throw new SettingNotFound("Setting was not found by the code [{$code}]", 404);
        }

        $this->settings()->attach($setting->id, ['value' => $value]);

        Cache::forget("settings.company-{$this->id}");
    }

    /**
     * Return setting's value for the Company
     *
     * @param      $code
     * @param null $default
     *
     * @return string|null
     */
    public function getSetting($code, $default = null)
    {
        return $this->getSettings()->get($code, $default)->value ?? $default;
    }
}