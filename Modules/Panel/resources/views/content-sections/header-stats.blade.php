@can(config('permissions_list.STATS_HEADER', false))
    <div class="col-md-12">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="stat-box use-cyan shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $dataCounts['users_count'] }}"></div>
                            <div class="h3">Users</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-people"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3 col-12">
                <div class="stat-box use-blue shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $dataCounts['articles_count'] }}"></div>
                            <div class="h3">Articles</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-globe"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->
            <div class="col-lg-3 col-12">
                <div class="stat-box use-green shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $dataCounts['categories_count'] }}"></div>
                            <div class="h3">Categories</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-grid"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-12">
                <div class="stat-box use-rose shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $visitsCount['all'] }}"></div>
                            <div class="h3">Visits</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-eye"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-12">
                <div class="stat-box use-purple shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $visitorsCount['all'] }}"></div>
                            <div class="h3">Visitors</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="fas en-users-viewfinder"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-12">
                <div class="stat-box use-purple shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $visitorsCount['member'] }}"></div>
                            <div class="h3">Member Visitors</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="far en-face-smile"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-12">
                <div class="stat-box use-purple shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $visitorsCount['guest'] }}"></div>
                            <div class="h3">Guest Visitors</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="fas en-face-smile"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->

            <div class="col-lg-3 col-12">
                <div class="stat-box use-red shadow">
                    <a>
                        <div class="stat">
                            <div class="counter-down" data-value="{{ $articlesVisitsCount['all'] }}"></div>
                            <div class="h3">Article Visits</div>
                        </div><!-- /.stat -->
                        <div class="visual">
                            <i class="icon-eyeglass"></i>
                        </div><!-- /.visual -->
                    </a>
                </div><!-- /.stat-box -->
            </div><!-- /.col-lg-3 -->
        </div><!-- /.row -->
    </div><!-- /.col-md-12 -->
@endcan
