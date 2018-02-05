<div class="sidebar">
  <div class="sidebar-dropdown"><a href="#">Navigation</a></div>

  <div class="sidebar-inner">
    <!-- Search form -->


    <!--- Sidebar navigation -->
    <!-- If the main navigation has sub navigation, then add the class "has_submenu" to "li" of main navigation. -->
    <ul class="navi">
      <li class="ngreen"><a href="{{$base_url}}/pro_admin/admin/user_manager"><i class="icon-bar-chart"></i> User </a></li>
      <li class="has_submenu nlightblue">
        <a href="#">
          <!-- Menu name with icon -->
          <i class="icon-th"></i> Game  
          <!-- Icon for dropdown -->
          <span class="pull-right"><i class="icon-angle-right"></i></span>
        </a>
        <ul>
          <li><a href="{{$base_url}}/pro_admin/admin/little_game">LOSE A LITTLE</a></li>
          <li><a href="{{$base_url}}/pro_admin/admin/lot_game">LOSE A LOT</a></li>
        </ul>
      </li>
      <li class="norange"><a href="{{$base_url}}/pro_admin/admin/plan_manager"><i class="icon-sitemap"></i> Plan </a></li>
      <li class="nred"><a href="{{$base_url}}/pro_admin/admin/email_manager"><i class="icon-list"></i> Email </a></li>
      <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/gift_manager"><i class="icon-table"></i> Gift </a></li>
      <li class="nred"><a href="{{$base_url}}/pro_admin/admin/blog_manager"><i class="icon-list"></i> Blog </a></li>
      <li class="nred"><a href="{{$base_url}}/pro_admin/admin/group_manager"><i class="icon-list"></i> Group </a></li>
      <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/refund_manager"><i class="icon-table"></i> Refund</a></li>
       <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/trans_manager"><i class="icon-table"></i> Transactions</a></li>
       <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/knowledgebase_manager"><i class="icon-table"></i> Articals </a></li>
      <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/feedback_manager"><i class="icon-table"></i> Feedback </a></li>
      <li class="nlightblue "><a href="{{$base_url}}/pro_admin/admin/admin_settings"><i class="icon-table"></i> Settings</a></li>
    </ul>
    <!-- Date -->
    <div class="sidebar-widget">
      <div id="todaydate"></div>
    </div>
  </div>
</div>