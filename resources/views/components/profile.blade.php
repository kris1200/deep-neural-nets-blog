   <div class="bd-example" style="max-width: 12.5rem;">
       <div class="dropdown">
           {{-- Either of the methods to display the currently authenticated user's profile photo work. You may use the one you prefer --}}
           <img src="{{ Auth::user()->profile_photo_url }}" {{-- src="{{ asset('/storage') }}/{{ Auth::user()->profile_photo_path }}" --}}
               role="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false" height="35px"
               width="35px" style="border-radius: 50%; object-fit: cover;">

           <ul class="dropdown-menu dropdown-menu-end text-start" aria-labelledby="dropdownMenuLink" style="">
               <li class="dropdown-item disabled text-dark" style="font-size: 0.9rem">Manage Account</li>
               <li>
                   <hr class="dropdown-divider">
               </li>
               <li><a class="dropdown-item" href="/user/profile">Profile</a></li>
               <li><a class="dropdown-item" href="/logout" id="logout">Logout</a></li>
               <form method="POST" action="{{ route('logout') }}" id="logout-form" hidden>
                   @csrf

                   <x-jet-responsive-nav-link href="{{ route('logout') }}" onclick="event.preventDefault();
                                            this.closest('form').submit();">
                       {{ __('Log Out') }}
                   </x-jet-responsive-nav-link>
               </form>
               <script>
                   document.getElementById("logout").addEventListener("click", (e) => {
                       e.preventDefault();
                       document.getElementById("logout-form").submit();
                   })
               </script>
           </ul>
       </div>
   </div>
