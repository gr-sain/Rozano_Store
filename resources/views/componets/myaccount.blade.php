<section class="accounts section--lg">
    <div class="accounts__container container grid">
        <div class="account__tabs">
            <p class="account__tab active-tab" data-target="#dashboard">
                <i class="fa-solid fa-gauge"></i> Dashboard
            </p>

            <p class="account__tab" data-target="#orders">
                <i class="fa-solid fa-bag-shopping"></i> Orders
            </p>

            <p class="account__tab" data-target="#update-profile">
                <i class="fa-solid fa-user"></i> Update Profile
            </p>

            <p class="account__tab" data-target="#address">
                <i class="fa-solid fa-marker"></i> My Address
            </p>

            <p class="account__tab" data-target="#change-password">
                <i class="fa-solid fa-user"></i> Change Password
            </p>

            <p class="account__tab">
                <i class="fa-solid fa-arrow-right-from-bracket"></i> Logout
            </p>
        </div>

        <div class="tabs__content">
            <div class="tab__content" content id="dashboard">
                <h3 class="tab__header">Hello Gourav!</h3>

                <div class="tab__body">
                    <p class="tab__desciption">
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Atque perferendis excepturi quod est temporibus?
                    </p>
                </div>
            </div>

            <div class="tab__content" content id="orders">
                <h3 class="tab__header">Your Orders</h3>

                <div class="tab__body">
                    <table class="placed__order-table">
                        <tr>
                            <th>Orders</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                            <th>Actions</th>
                        </tr>
                        <tr>
                            <td>#1345</td>
                            <td>March 45, 2020</td>
                            <td>Processing</td>
                            <td>$125.00</td>
                            <td><a href="#" class="view__order">View</a></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="tab__content" content id="update-profile">
                <h3 class="tab__header">Update Profile</h3>

                <div class="tab__body">
                    <form action="" class="form grid">
                        <input type="text" placeholder="Username" class="form__input">
                        <div class="form__btn">
                            <button class="btn btn--md">Save</button>
                        </div>
                    </form>
                </div>
            </div>

            <div class="tab__content" content id="address">
                <h3 class="tab__header">Shipping Address</h3>

                <div class="tab__body">
                    <address class="address">
                        2343 Interstate <br>
                        45 business Spur, <br>
                        Sault Ste. <br>
                        Marie, MI 2345
                    </address>
                    <p class="city">New York</p>
                    <a href="" class="edit">Edit</a>
                </div>
            </div>

            <div class="tab__content" content id="change-password">
                <h3 class="tab__header">Change Password</h3>

                <div class="tab__body">
                    <form action="" class="form grid">
                        <input type="password" placeholder="Current Password" class="form__input">
                        <input type="password" placeholder="New Password" class="form__input">
                        <input type="password" placeholder="Confirm Password" class="form__input">
                        <div class="form__btn">
                            <button class="btn btn--md">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</section>