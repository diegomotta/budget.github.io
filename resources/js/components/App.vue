<template>
    <div>
        <div id="wrapper">
            <div id="page-wrapper" class="gray-bg">
                <div class="row border-bottom white-bg">
                    <nav class="navbar navbar-expand-lg navbar-static-top" role="navigation">

                        <a href="#" class="navbar-brand">Inspinia</a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar"
                                aria-expanded="false" aria-label="Toggle navigation">
                            <i class="fas fa-bars"></i>
                        </button>

                        <!--</div>-->
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav mr-auto">
                                <li class="dropdown">
                                    <a aria-expanded="false" role="button" href="#" class="dropdown-toggle"
                                       data-toggle="dropdown">Parámetros</a>
                                    <ul role="menu" class="dropdown-menu">
                                        <router-link tag="li" :to="{name:'typeExpenses'}" ><a>Tipo de gastos</a></router-link>
                                    </ul>
                                </li>
                            </ul>
                            <ul class="nav navbar-top-links navbar-right">
                                <li>
                                    <a href="login.html">
                                        <i class="fa fa-sign-out"></i> Log out
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
                <router-view></router-view>
            </div>
        </div>
    </div>
</template>
<script>
    export default {}
</script>