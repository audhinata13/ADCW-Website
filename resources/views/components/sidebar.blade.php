 <div class="main-sidebar sidebar-style-2">
     <aside id="sidebar-wrapper">
         <div class="sidebar-brand">
             <a href="{{ route('dashboard') }}">Event Management</a>
         </div>
         <div class="sidebar-brand sidebar-brand-sm">
             <a href="{{ route('dashboard') }}">EM</a>
         </div>
         <ul class="sidebar-menu">
             <li>
                 <a class="nav-link" href="{{ route('dashboard') }}"><i class="fas fa-home"></i>
                     <span>Dashboard</span></a>
             </li>
             <li>
                 <a class="nav-link" href="{{ route('registration-events.index') }}"><i class="fas fa-folder"></i>
                     <span>Registration</span></a>
             </li>
             <li>
                 <a class="nav-link" href="{{ route('events.index') }}"><i class="fas fa-folder"></i>
                     <span>Events</span></a>
             </li>
             <li>
                 <a class="nav-link" href="{{ route('previous-events.index') }}"><i class="fas fa-folder"></i>
                     <span>Previous Events</span></a>
             </li>
             <li class="dropdown">
                 <a href="#" class="nav-link has-dropdown"><i class="fas fa-th-large"></i>
                     <span>Master</span></a>
                 <ul class="dropdown-menu">
                     <li><a class="nav-link" href="{{ route('faqs.index') }}">Faq</a></li>
                     <li><a class="nav-link" href="{{ route('committees.index') }}">Committee</a></li>
                     <li><a class="nav-link" href="{{ route('users.index') }}">User</a></li>
                     <li><a class="nav-link" href="{{ route('company-profile.index') }}">Company Profile</a></li>
                 </ul>
             </li>

         </ul>
     </aside>
 </div>
