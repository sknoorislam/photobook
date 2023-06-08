<template>
    <nav class="navbar navbar-expand-lg bg-body-tertiary">
        <div class="container">
            <router-link to="/" class="navbar-brand"><img alt="Vue logo" src="../assets/logo.png" width="30"> PhotoBook</router-link>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto me-3 mb-2 mb-lg-0 text-center text-md-center">
                    <li class="nav-item">
                        <router-link to="/" class="nav-link">Home</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link to="/about" class="nav-link">About</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name:'gallery' }" class="nav-link">Gallery</router-link>
                    </li>
                    <li class="nav-item">
                        <router-link :to="{ name:'photographer' }" class="nav-link">Photgraphers</router-link>
                    </li>
                    <!-- <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                        Dropdown
                    </a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item" href="#">Action</a></li>
                        <li><a class="dropdown-item" href="#">Another action</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item" href="#">Something else here</a></li>
                    </ul>
                    </li> -->
                    
                </ul>
                <div class="d-flex" role="search">
                    <router-link :to="{ name:'login' }" class="btn btn-outline-success me-2">Login</router-link>
                    <router-link :to="{ name:'register' }" class="btn btn-success me-2">Register</router-link>
                </div>
            </div>
        </div>
    </nav>

</template>
<script>
// import axios from 'axios'

export default{
    name: "HeaderPart",
}
</script>