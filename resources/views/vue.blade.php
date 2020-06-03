@extends('layouts.app')


@section('app')



	<div id="app" class="flex flex-col h-screen">


        <navbar class="sticky top-0"></navbar>



        <main class="flex-grow">
            
            <router-view></router-view>
        
        </main>




        @if(auth()->user())
            <footer class="fixed bottom-0 w-full mt-20 overflow-y-scroll">


                <div class="flex px-20 py-2 justify-between items-center bg-indigo-900 text-white">

                    <div>

                        <i class="pr-2 fas fa-dog fa-2x"></i>

                    </div>

                    <div>

                        <i class="pr-2 fas fa-address-book fa-2x"></i>

                    </div>

                    <div>

                        <i class="pr-2 fas fa-file-invoice-dollar fa-2x"></i>

                    </div>

                </div>

            </footer>

        @endif



    </div>


    

@endsection


