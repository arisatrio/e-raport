<aside class="left-sidebar">
    <div class="scroll-sidebar">
        
        <nav class="sidebar-nav"  style="margin-top:10px;">
            <ul id="sidebarnav">

                <li class="sidebar-item">
                    <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                        <i class="mdi mdi-view-dashboard"></i>
                        <span class="hide-menu">Dashboard</span>
                    </a>
                </li>

                <div class="dropdown-divider"></div>

                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu">Kelas & Jurusan</span>
                    </a>
                    <ul aria-expanded="true" class="collapse first-level">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.tahun-ajaran.index') }}" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Tahun Ajaran</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Jurusan</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Kelas</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu">Guru</span>
                    </a>
                    <ul aria-expanded="true" class="collapse first-level">
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Wali Kelas</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Guru Mapel</span>
                            </a>
                        </li>
                        <li class="sidebar-item"> 
                            <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                <i class="mdi mdi-adjust"></i><span class="hide-menu">Guru BK</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu">Siswa</span>
                    </a>
                </li>

                <li class="sidebar-item"> 
                    <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                        <i class="mdi mdi-file-document"></i><span class="hide-menu">Mata Pelajaran</span>
                    </a>
                </li>
                {{-- <li class="sidebar-item">
                    <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        <span class="hide-menu">Data Siswa</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        <span class="hide-menu">Data Kelas</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        <span class="hide-menu">Data Guru</span>
                    </a>
                </li>
                <li class="sidebar-item">
                    <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                        <i class="fas fa-database"></i>
                        <span class="hide-menu">Data Mapel</span>
                    </a>
                </li> --}}

            </ul>
        </nav>

    </div>
</aside>