<div id="all">
    <div id="content">
        <div class="container">
            <div class="col-md-12">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a>
                    </li>
                    <li>New account / Sign in</li>
                </ul>
            </div>

            <div class="col-md-6">
                <div class="box">
                    <h1>New account</h1>
                    <p class="lead" style = "display: inline">Not our registered customer yet? </p>
                    <p class="text-muted" style = "display: inline"> Sign Up now.</p>
                    <br><br>
                    <p>With registration with us new world of fashion, fantastic discounts and much more opens to you! The whole process will not take you more than a minute!</p>
                    <p class="text-muted">If you have any questions, please feel free to <a href="<?= base_url().'home/contact'; ?>">contact us</a>, our customer service center is working for you 24/7.</p>
                    <hr>
                    <form action="<?= base_url().'home/customer_orders'; ?>" method="post">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" class="form-control" id="name">
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-user-md"></i> Register</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-6">
                <div class="box">
                    <h1>Login</h1>
                    <p class="lead" style = "display: inline">Already our customer? </p>
                    <p class="text-muted" style = "display: inline">Sign in now to start shopping.</p>
                    <hr>
                    <form action="<?= base_url().'home/customer_orders'; ?>" method="post">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" id="email">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" id="password">
                        </div>
                        <div class="text-center">
                            <button type="submit" class="btn btn-primary"><i class="fa fa-sign-in"></i> Log in</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> <!-- /.container -->
    </div> <!-- /#content -->