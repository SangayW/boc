<div class="container">
    <!-- left, vertical navbar & content -->
    <div class="row col-md-12">
        <!-- left, vertical navbar -->
        <div class="col-md-3 bootstrap-admin-col-left">
            <ul class="nav navbar-collapse collapse bootstrap-admin-navbar-side">
                <li class="active">
                    <a href="home"><i class="pull-left glyphicon glyphicon-dashboard"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Dashboard</span><i class="glyphicon glyphicon-chevron-right"></i></a>
                </li>
                <li>
                    <ul class="nav nav-list nav-menu-list-style">
                        <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Master</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                            <ul class="nav nav-list tree bullets">
                                <li><a href="{{route('view_user')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;User</a></li>
                                <li><a href="{{route('country_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Country</span></a></li>
                                <li><a href="{{route('dzongkhag_master.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Dzongkhag</span></a></li>
                            </ul>
                        </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href="{{route('sport_organization.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>Sport Organization Profile</span></a></li>
                    </ul>
                </li>
                <li><a href="#" class="tree-toggle nav-header"><i class="pull-left glyphicon glyphicon-list"></i>&nbsp;&nbsp;&nbsp;&nbsp;<span>Annual Activities Plan</span><span class="menu-collapsible-icon glyphicon glyphicon-chevron-right"></span></a>
                    <ul class="nav nav-list tree bullets">
                        <li><a href='{{route('skra.index')}}'><i class='pull-left glyphicon glyphicon-circle-arrow-right glyphicon-align-right'></i>&nbsp;&nbsp;&nbsp;<span>SKRAs</span></a></li>
                        <li><a href="{{route('skra_activities.index')}}"><i class='pull-left glyphicon glyphicon-circle-arrow-right'></i>&nbsp;&nbsp;&nbsp;<span>SKRA activities</span></a></li>
                    </ul>
                </li>      
            </ul>
        </li>
    </ul>
</div>
</div>
</div>
<script type="text/javascript">
    $('.tree-toggle').click(function()
    {
        $(this).parent().children('ul.tree').toggle(200);

    });
    $(function(){
        $('.tree-toggle').parent().children('ul.tree').toggle(200);
    });


</script>
