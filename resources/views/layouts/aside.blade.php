<aside class="left-sidebar">
    <div class="scroll-sidebar">
        
        <nav class="sidebar-nav"  style="margin-top:10px;">
            <ul id="sidebarnav">

                @if(auth()->user()->isAdmin())
                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="sidebar-item"> 
                        <a class="sidebar-link waves-effect" href="{{ route('admin.kelas-siswa.index') }}" aria-expanded="false">
                            <i class="mdi mdi-account-multiple"></i><span class="hide-menu">Kelas</span>
                        </a>
                    </li>

                    <li class="sidebar-item"> 
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-account"></i><span class="hide-menu">User</span>
                        </a>
                        <ul aria-expanded="true" class="collapse first-level">
                            {{-- <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Wali Kelas</span>
                                </a>
                            </li> --}}
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.guru.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Guru</span>
                                </a>
                            </li>
                            {{-- <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="#" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">BK</span>
                                </a>
                            </li> --}}
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.siswa.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Siswa</span>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="sidebar-item"> 
                        <a class="sidebar-link has-arrow waves-effect waves-dark" href="javascript:void(0)" aria-expanded="false">
                            <i class="mdi mdi-database"></i><span class="hide-menu">Master Data</span>
                        </a>
                        <ul aria-expanded="true" class="collapse first-level">
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.tahun-ajaran.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Tahun Ajaran</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.jurusan.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Jurusan</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.kelas.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Ruang Kelas</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.mapel-umum.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Mata Pelajaran Umum</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.mapel-jurusan.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Mata Pelajaran Kejuruan</span>
                                </a>
                            </li>
                            <li class="sidebar-item"> 
                                <a class="sidebar-link waves-effect waves-dark sidebar-link" href="{{ route('admin.ekstrakulikuler.index') }}" aria-expanded="true">
                                    <i class="mdi mdi-adjust"></i><span class="hide-menu">Ekstrakulikuler</span>
                                </a>
                            </li>
                        </ul>
                    </li>
                @elseif(auth()->user()->isWalas())
                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-plus"></i>
                            <span class="hide-menu">Input Penilaian Sikap</span>
                        </a>
                    </li>
                @elseif(auth()->user()->isMurid())
                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-view-dashboard"></i>
                            <span class="hide-menu">Dashboard</span>
                        </a>
                    </li>

                    <div class="dropdown-divider"></div>

                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-database"></i>
                            <span class="hide-menu">Rapor Saya</span>
                        </a>
                    </li>
                    <li class="sidebar-item">
                        <a class="waves-effect sidebar-link" href="#" aria-expanded="false">
                            <i class="mdi mdi-account"></i>
                            <span class="hide-menu">Biodata Saya</span>
                        </a>
                    </li>
                @endif
                
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