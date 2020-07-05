@extends('master')

@section('title', 'Home Page')

@section('body')	

    <div class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-4">
                    <div class="card">

                        <div class="header">
                            <h4 class="title">{{ trans('home.col_4_title_header') }}</h4>
                            <p class="category">{{ trans('home.col_4_category') }}</p>
                        </div>
                        <div class="content">
                            <div id="chartPreferences" class="ct-chart ct-perfect-fourth"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> {{ trans('home.col_4_legend_1') }}
                                    <i class="fa fa-circle text-danger"></i> {{ trans('home.col_4_legend_2') }}
                                    <i class="fa fa-circle text-warning"></i> {{ trans('home.col_4_legend_3') }}
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-clock-o"></i> {{ trans('home.col_4_stats') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-8">
                    <div class="card">
                        <div class="header">
                            <h4 class="title">{{ trans('home.col_8_title_header') }}</h4>
                            <p class="category">{{ trans('home.col_8_category') }}</p>
                        </div>
                        <div class="content">
                            <div id="chartHours" class="ct-chart"></div>
                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i>{{ trans('home.col_8_legend_1') }}
                                    <i class="fa fa-circle text-danger"></i> {{ trans('home.col_8_legend_2') }}
                                    <i class="fa fa-circle text-warning"></i> {{ trans('home.col_8_legend_3') }}
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> {{ trans('home.col_8_stats') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>



            <div class="row">
                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">{{ trans('home.col_6_title_header') }}</h4>
                            <p class="category">{{ trans('home.col_6_category') }}</p>
                        </div>
                        <div class="content">
                            <div id="chartActivity" class="ct-chart"></div>

                            <div class="footer">
                                <div class="legend">
                                    <i class="fa fa-circle text-info"></i> {{ trans('home.col_6_legend_1') }}
                                    <i class="fa fa-circle text-danger"></i> {{ trans('home.col_6_legend_2') }}
                                </div>
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-check"></i> {{ trans('home.col_6_stats') }}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="card ">
                        <div class="header">
                            <h4 class="title">Tasks</h4>
                            <p class="category">Backend development</p>
                        </div>
                        <div class="content">
                            <div class="table-full-width">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox1" type="checkbox">
					  							  	<label for="checkbox1"></label>
				  						  		</div>
                                            </td>
                                            <td>Sign contract for "What are conference organizers afraid of?"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox2" type="checkbox" checked>
					  							  	<label for="checkbox2"></label>
				  						  		</div>
                                            </td>
                                            <td>Lines From Great Russian Literature? Or E-mails From My Boss?</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox3" type="checkbox">
					  							  	<label for="checkbox3"></label>
				  						  		</div>
                                            </td>
                                            <td>Flooded: One year later, assessing what was lost and what was found when a ravaging rain swept through metro Detroit
											</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox4" type="checkbox" checked>
					  							  	<label for="checkbox4"></label>
				  						  		</div>
                                            </td>
                                            <td>Create 4 Invisible User Experiences you Never Knew About</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox5" type="checkbox">
					  							  	<label for="checkbox5"></label>
				  						  		</div>
                                            </td>
                                            <td>Read "Following makes Medium better"</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
												<div class="checkbox">
					  							  	<input id="checkbox6" type="checkbox" checked>
					  							  	<label for="checkbox6"></label>
				  						  		</div>
                                            </td>
                                            <td>Unfollow 5 enemies from twitter</td>
                                            <td class="td-actions text-right">
                                                <button type="button" rel="tooltip" title="Edit Task" class="btn btn-info btn-simple btn-xs">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button type="button" rel="tooltip" title="Remove" class="btn btn-danger btn-simple btn-xs">
                                                    <i class="fa fa-times"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <div class="footer">
                                <hr>
                                <div class="stats">
                                    <i class="fa fa-history"></i> Updated 3 minutes ago
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    {{-- end content --}}
    <footer class="footer">
        <div class="container-fluid">
            <nav class="pull-left">
                <ul>
                    <li>
                        <a href="#">
                            Home
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Company
                        </a>
                    </li>
                    <li>
                        <a href="#">
                            Portfolio
                        </a>
                    </li>
                    <li>
                        <a href="#">
                           Blog
                        </a>
                    </li>
                </ul>
            </nav>
            <p class="copyright pull-right">
                &copy; <script>document.write(new Date().getFullYear())</script> <a href="http://www.creative-tim.com">Creative 17CDTH31</a>, made with love for a better web
            </p>
        </div>
    </footer>
    {{-- end footer --}}
@endsection