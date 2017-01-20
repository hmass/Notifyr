<div id="main_navigation" class="dark_navigation"> <!-- Main navigation start -->
    <div class="inner_navigation">
        <ul class="main">
            <li class="active navAct"><a id="current" href="<?=base_url('dashboard')?>"><i class="icon-dashboard"></i> Dashboard</a></li>
            <li><a href=""><i class="icon-group"></i>Contacts List</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('contacts')?>">View Active Contacts</a></li>
                    <li><a href="<?=base_url('contacts/suspended')?>">View Suspended Contacts</a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-puzzle-piece"></i>SMS Groups</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('groups')?>">View Groups</a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-file-text"></i> SMS Reports</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('reports/cummulative')?>">Cummulative Queries</a></li>
                    <li><a href="<?=base_url('reports/purchases')?>">Purchase Report</a></li>
                    <li><a href="<?=base_url('reports/received')?>">Group Messages Received</a></li>
                    <li><a href="<?=base_url('reports/replied')?>">Group Messages Replied</a></li>
                    <li><a href="<?=base_url('reports/pending')?>">Group Messages Pending</a></li>
                    <li><a href="<?=base_url('reports/bulksms')?>">Bulk Alerts Sent</a></li>
                    <li><a href="<?=base_url('reports/sms')?>">Single Alerts Sent</a></li>
                    <li><a href="<?=base_url('reports/subscribed')?>">Subscribed Contacts</a></li>
                    <li><a href="<?=base_url('reports/subscriptions')?>">Subscription Messages</a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-tags"></i>Products</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('products')?>">View Products</a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-map-marker"></i>Towns</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('towns')?>">View Towns</a></li>
                </ul>
            </li>
            <li><a href=""><i class="icon-globe"></i>Regions</a>
                <ul class="sub_main">
                    <li><a href="<?=base_url('regions')?>">View Regions</a></li>
                </ul>
            </li>
        </ul>
    </div>
</div>