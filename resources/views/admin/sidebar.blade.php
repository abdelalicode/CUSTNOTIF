<button data-drawer-target="logo-sidebar" data-drawer-toggle="logo-sidebar" aria-controls="logo-sidebar" type="button" class="inline-flex items-center p-2 mt-2 ms-3 text-sm text-gray-500 rounded-lg sm:hidden hover:bg-gray-100 focus:outline-none focus:ring-2 focus:ring-gray-200 dark:text-gray-400 dark:hover:bg-gray-700 dark:focus:ring-gray-600">
    <span class="sr-only">Open sidebar</span>
    <svg class="w-6 h-6" aria-hidden="true" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
    <path clip-rule="evenodd" fill-rule="evenodd" d="M2 4.75A.75.75 0 012.75 4h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 4.75zm0 10.5a.75.75 0 01.75-.75h7.5a.75.75 0 010 1.5h-7.5a.75.75 0 01-.75-.75zM2 10a.75.75 0 01.75-.75h14.5a.75.75 0 010 1.5H2.75A.75.75 0 012 10z"></path>
    </svg>
 </button>
 
 <aside style="font-size:0.8em; font-family: 'Poppins', sans-serif;" id="logo-sidebar" class="fixed top-0 left-0 z-40 w-64 h-screen transition-transform -translate-x-full sm:translate-x-0" aria-label="Sidebar">
    <div class="h-full px-3 py-4 overflow-y-auto bg-white dark:bg-gray-800">
       <a href="{{ route('dashboard') }}" class="flex items-center ps-2.5 mb-5 gap-3">
         <img width="48" height="48" src="https://img.icons8.com/glyph-neue/64/FAB005/three-leaf-clover.png"
         alt="three-leaf-clover" />
        <p class="font-semibold text-sky-800">NOTIFTEST</p>
       </a>
       <ul class="space-y-2 font-medium mt-24">
          <li>
             <a href="" class="flex gap-2 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">               
               <span class="ms-3">Users</span>
             </a>
          </li>
          <li>
            <a href="{{ route('notification.index') }}" class="flex gap-2 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
               
               <span class="flex-1 ms-3 whitespace-nowrap">Notifications</span>
               <span class="inline-flex items-center justify-center px-2 ms-3 text-xs font-medium text-gray-800 bg-sky-200 rounded-md dark:bg-gray-700 dark:text-gray-300">Create</span>

            </a>
         </li>
        
          <li>
             <a href="" class="flex gap-2 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <span class="flex-1 ms-3 whitespace-nowrap">Approve</span>
             </a>
          </li>
          <li>
             <a href="{{route('logout')}}" class="flex gap-2 items-center p-2 text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700 group">
                <svg class="flex-shrink-0 w-5 h-5 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 18 16">
                   <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M1 8h11m0 0L8 4m4 4-4 4m4-11h3a2 2 0 0 1 2 2v10a2 2 0 0 1-2 2h-3"/>
                </svg>
                <span class="flex-1 ms-3 whitespace-nowrap">Logout</span>
             </a>
          </li>
       </ul>
    </div>
 </aside>