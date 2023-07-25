
        <!--begin::Menu-->
        <div class="menu menu-column menu-rounded menu-sub-indention px-3" id="#kt_app_sidebar_menu" data-kt-menu="true"
             data-kt-menu-expand="false">

                @php( $role = \App\Helpers\ConnectedAdmin::get()->role)

                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
					<span class="menu-icon"><img src="{{ asset('assets/imgs/setting.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
					<span class="menu-title">Gestion des Admins</span>
					<span class="menu-arrow"></span>
				</span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                        <!--begin:Menu item-->
                        <div class="menu-item">
                            <!--begin:Menu link-->
                            <a class="menu-link" href="{{route('admin.profile')}}">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                                <span class="menu-title">Gestion Profil</span>
                            </a>
                            <!--end:Menu link-->
                        </div>
                        <!--end:Menu item-->

                    @if($role === \App\Enums\AdminRole::SUPER_ADMIN)
                        <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="#">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                                    <span class="menu-title">Liste des Users Admins</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                            <!--begin:Menu item-->
                            <div class="menu-item">
                                <!--begin:Menu link-->
                                <a class="menu-link" href="#">
							<span class="menu-bullet">
								<span class="bullet bullet-dot"></span>
							</span>
                                    <span class="menu-title">@lang('app.add')</span>
                                </a>
                                <!--end:Menu link-->
                            </div>
                            <!--end:Menu item-->
                        @endif
                    </div>
                    <!--end:Menu sub-->
                </div>
                
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/school.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">{{ trans('elements.gestion_des_etablissement')}}</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">{{trans('elements.etablissement')}}</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('admin.etablissements.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">{{trans('elements.liste_des_etablissements')}}</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('admin.etablissements.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('elements.Centre_de_Formation')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.centresFormations.index')  }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('elements.liste_des_centres_de_Formations')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.centresFormations.create')  }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('elements.directeur')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.directeur.index')  }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('elements.liste_des_directeurs')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('admin.directeur.create')  }}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="#">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Affectation Options du CF</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/abonement.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('elements.gestion_des_abonnement')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('elements.abonnement')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('admin.abonnements.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('elements.liste_des_abonnements')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('admin.abonnements.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('admin.abonnements.affectation')}}">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
                                <span class="menu-title">Affectation Abonnement</span>
                            </a>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                    <span class="menu-link">
                        <span class="menu-icon"><img src="{{ asset('assets/imgs/formations.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                        <span class="menu-title">Paramétrage des Formation</span>
                        <span class="menu-arrow"></span>

                    </span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Secteurs</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Secteurs</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Option</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste Option</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_formations">

                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Niveau Filières</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Niveau Filières</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="#">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Periodes</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('periodes.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des periodes</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('periodes.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Modules</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('modules.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Modules</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('modules.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                                            <span class="menu-link">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                                <span class="menu-title">Matieres</span>
                                                <span class="menu-arrow"></span>
                                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('matieres.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Matieres</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('matieres.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Chapitres</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Chapitres</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">Sections</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des Sections</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
                            <span class="menu-link">
                                <span class="menu-bullet">
                                    <span class="bullet bullet-dot"></span>
                                </span>
                                <span class="menu-title">blocs</span>
                                <span class="menu-arrow"></span>
                            </span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.index') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">Liste des blocs</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{ route('chapitres.create') }}">
                                                        <span class="menu-bullet">
                                                            <span class="bullet bullet-dot"></span>
                                                        </span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                                data-bs-toggle="collapse" href="#kt_app_sidebar_menu_formations"
                                data-kt-toggle-text="Moins">
                                    <span data-kt-toggle-text-target="true">Plus</span>
                
                                    {!! getSvgIcon('duotune/general/gen036.svg', 'svg-icon toggle-on svg-icon-2 me-0') !!}
                                    {!! getSvgIcon('duotune/general/gen035.svg', 'svg-icon toggle-off svg-icon-2 me-0') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/building.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('Gesion Espace')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Batimens')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('Batiments.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de batiments')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('Batiments.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="menu-inner flex-column collapse" id="kt_app_sidebar_menu_espace">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Blocs')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('blocs.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de Blocs')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('blocs.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Type de Salles')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('TypesSalles.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de type salles')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('TypesSalles.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Salles')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('salles.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de salles')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('salles.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        </div>
                        <div class="menu-item">
                            <div class="menu-content">
                                <a class="btn btn-flex btn-color-primary d-flex flex-stack fs-base p-0 ms-2 mb-2 toggle collapsible collapsed"
                                   data-bs-toggle="collapse" href="#kt_app_sidebar_menu_espace"
                                   data-kt-toggle-text="Moins">
                                    <span data-kt-toggle-text-target="true">Plus</span>
                
                                    {!! getSvgIcon('duotune/general/gen036.svg', 'svg-icon toggle-on svg-icon-2 me-0') !!}
                                    {!! getSvgIcon('duotune/general/gen035.svg', 'svg-icon toggle-off svg-icon-2 me-0') !!}</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/bell.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('Gesion Notification')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Categorie Notification')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de Categories Notifications')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Notifications')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de Notifications')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                                
                            </div>
                        </div>
                        <div class="menu-item">
                            <a class="menu-link" href="{{route('notifications.create')}}">
                                                <span class="menu-bullet">
                                                    <span class="bullet bullet-dot"></span>
                                                </span>
                                <span class="menu-title">@lang('Affectation Notifications')</span>
                            </a>
                        </div>
                      
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/teacher.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('Gesion des Formateurs ')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Formateurs')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des Formateurs')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Contrat')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des Contrats')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Absences')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des absences')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/reading.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('Gesion des Etudiants ')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Etudiants')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des Etudiants')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Groupe Annees')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de groupe Annes')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Absences')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des absences')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>
                <div data-kt-menu-trigger="click" class="menu-item menu-accordion">

                                    <span class="menu-link">
                                        <span class="menu-icon"><img src="{{ asset('assets/imgs/schedule.png') }}" style="background: rgb(132, 180, 252);border-radius:50%;width:25px" alt=""></span>
                                        <span class="menu-title">@lang('Gesion d\'Emplois de temps ')</span>
                                        <span class="menu-arrow"></span>

									</span>
                    <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="156">
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Seances')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des Seances')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('CategoriesNotifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Type Seance')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste de Type  de Seances')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div data-kt-menu-trigger="click" class="menu-item menu-accordion">
											<span class="menu-link">
												<span class="menu-bullet">
													<span class="bullet bullet-dot"></span>
												</span>
												<span class="menu-title">@lang('Details Seances')</span>
												<span class="menu-arrow"></span>
											</span>
                            <div class="menu-sub menu-sub-accordion menu-active-bg" style="display: none; overflow: hidden;" kt-hidden-height="195">
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.index')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('Liste des details de seances')</span>
                                    </a>
                                </div>
                                <div class="menu-item">
                                    <a class="menu-link" href="{{route('notifications.create')}}">
														<span class="menu-bullet">
															<span class="bullet bullet-dot"></span>
														</span>
                                        <span class="menu-title">@lang('app.add')</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                      
                    </div>
                </div>





        <!--begin:Menu item-->
        </div>
        <!--end::Menu-->
