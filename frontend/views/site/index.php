<?php

/** @var yii\web\View $this */

$this->title = 'My Yii Application';
?>
<div class="site-index">
    <div class="p-5 mb-4 bg-transparent rounded-3">
        <div class="container-fluid py-5 text-center">
            <h1 class="display-4">User Management Application!</h1>
            <p class="fs-5 fw-light">Do login or signup</p>
            <div>
                <p class="fs-5 fw-light">site/* routes are available for anyone</p>
                <p class="fs-5 fw-light">user/view route is availble for every login user</p>
                <p class="fs-5 fw-light">user/update route is availble for every login user to own profile</p>
                <p class="fs-5 fw-light">admin/* routes are availble for only admin user</p>
                <p class="fs-5 fw-light">user/delete route is availble for only admin user</p>
                <p class="fs-5 fw-light">user/update route is availble for admin to change any user profile</p>
                <p class="fs-5 fw-light">User Management is only available for admin user</p>
            </div>
        </div>
    </div>

</div>