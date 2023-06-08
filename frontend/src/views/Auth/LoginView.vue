<template>
   
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-lg-4 col-md-6">
                <img src="../../../public/img/photographer-taking-photo.jpg" class="img-fluid">
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="card p-4 shadow-lg border-0">
                    <div class="card-header h4 bg-white">Login to continue</div>
                    <div class="card-body text-start">
                        <form @submit.prevent="getFormValues">
                            <div class="mb-3">
                                <label for="email" class="form-label">Email ID</label>
                                <input type="text" v-model="loginForm.email" class="form-control " id="email" placeholder="Enter your email">
                                <span v-if="loginError.email" class="text-danger">{{ loginError.email[0] }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="input_2" class="form-label">Password</label>
                                <input type="text" v-model="loginForm.password" class="form-control" id="password" placeholder="Enter your password">
                                <span v-if="loginError.password" class="text-danger">{{ loginError.password[0] }}</span>
                            </div>
                            <div>
                                <button type="submit" class="btn btn-primary border" href="#">Login now</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import axios from 'axios'
import swal from 'sweetalert'

export default{
    name: "LoginView",
    data(){
        return{
            loginForm : {
                email : "",
                password : ""
            },
            loginError: {
                email : false,
                password : false
            }
        }
    },
    methods: {
        async getFormValues () {
            try {
                await axios({
                    method: 'post',
                    url: 'http://127.0.0.1:8000/api/login',
                    data: {
                        email: this.loginForm.email,
                        password: this.loginForm.password,
                    }
                })
                .then((response) => {
                    console.log(response.data)
                    if(response.data.status == "error")
                    {
                        // swal ( "Oops" ,  response.data.message ,  "error" )
                        this.loginError.email = response.data.error.email
                        this.loginError.password = response.data.error.password
                    }
                    else
                    {
                        swal ( "Please wait" ,  "We are redirect to you ...." ,  "success" );
                        sessionStorage.setItem('user_token',response.data.token);
                        window.location.href = '/';
                    }
                })
            } catch (error) {
                // Handle errors
                swal({
                    title: "Server Error",
                    text: `Error ${error}`,
                    icon: "error",
                });
            }
            
        }
    }
}
</script>