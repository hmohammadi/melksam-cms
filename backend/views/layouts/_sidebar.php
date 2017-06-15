<aside id="main__sidebar">
    <a class="hidden-lg main__block-close" href="index.html" data-rmd-action="block-close" data-rmd-target="#main__sidebar">
        <i class="zmdi zmdi-long-arrow-left"></i>
    </a>

    <ul class="main-menu">
        <li <?php if(in_array(\Yii::$app->controller->id,['site']) && in_array(\Yii::$app->controller->action->id,['index'])) {echo 'class="active"';} ?>>
          <a href="<?= Yii::$app->homeUrl ?>"><i class="zmdi zmdi-chart"></i> صفحه شخصی</a>
        </li>

        <li <?php if(in_array(\Yii::$app->controller->id,['property'])) {echo 'class="active"';} ?>>
          <a href="<?= \Yii::$app->homeUrl ?>property"><i class="zmdi zmdi-view-list"></i> لیست املاک ثبت شده</a>
        </li>

        <li <?php if(in_array(\Yii::$app->controller->id,['property'])) {echo 'class="active"';} ?>>
          <a href="#" id="btn-1" data-toggle="collapse" data-target="#submenu1" aria-expanded="false"><i class="zmdi zmdi-view-list"></i> ثبت ملک جدید <span class="zmdi zmdi-chevron-down"></span></a>
          <ul class="nav collapse" id="submenu1" role="menu" aria-labelledby="btn-1">
				<li><a href="#">Link 2.1</a></li>
				<li><a href="#">Link 2.2</a></li>
				<li><a href="#">Link 2.3</a></li>
			</ul>
        </li>

        <li <?php if(in_array(\Yii::$app->controller->id,['user'])) {echo 'class="active"';} ?>>
          <a href="<?= Yii::$app->homeUrl ?>user"><i class="zmdi zmdi-account-box"></i> کاربران</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['inbox'])) {echo 'class="active"';} ?>>
          <a href="leads.html"><i class="zmdi zmdi-inbox "></i> صندوق پیام های دریافتی</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['tasks'])) {echo 'class="active"';} ?>>
          <a href="tasks-lists.html"><i class="zmdi zmdi-check-circle"></i> لیست وظایف</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['notes'])) {echo 'class="active"';} ?>>
          <a href="notes.html"><i class="zmdi zmdi-file-text"></i> یادداشت های روزانه</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['blog'])) {echo 'class="active"';} ?>>
          <a href="calendar.html"><i class="zmdi zmdi-blogger"></i> مدیریت مطالب بلاگ</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['q&a'])) {echo 'class="active"';} ?>>
          <a href="questions-answers.html"><i class="zmdi zmdi-help"></i> Questions & Answers</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->action->id,['baseinfo'])) {echo 'class="active"';} ?>>
          <a href="<?= \Yii::$app->homeUrl ?>site/baseinfo"><i class="zmdi zmdi-view-dashboard"></i> مدیریت اطلاعات ملکی</a>
        </li>
        <li <?php if(in_array(\Yii::$app->controller->id,['settings'])) {echo 'class="active"';} ?>>
          <a href="#"><i class="zmdi zmdi-settings"></i>تنظیمات سایت </a>
        </li>
        <!-- <li <?php if(in_array(\Yii::$app->controller->id,['log'])) {echo 'class="active"';} ?>>
          <a href="activity-log.html"><i class="zmdi zmdi-time"></i> Activity Log</a>
        </li> -->
    </ul>
</aside>