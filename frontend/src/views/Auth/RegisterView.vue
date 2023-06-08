<template>
    <div class="container">
        <div class="row align-items-center justify-content-center vh-100">
            <div class="col-md-4">
                <img src="../../../public/img/photographer-taking-photo.jpg" class="img-fluid">
            </div>
            <div class="col-md-4">
                <div class="card p-4 shadow-lg border-0">
                    <div class="card-header h4 bg-white">Create an account</div>
                    <div class="card-body text-start ">
                        <form @submit.prevent="getFormValues">
                            <div class="mb-3">
                                <label for="name" class="form-label">Name</label>
                                <input type="text" v-model="Form.name" class="form-control " id="name" placeholder="Enter your name">
                                <span v-if="Error.name" class="text-danger">{{ Error.name[0] }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email ID</label>
                                <input type="text" v-model="Form.email" class="form-control " id="email" placeholder="Enter your email">
                                <span v-if="Error.email" class="text-danger">{{ Error.email[0] }}</span>
                            </div>
                            <div class="mb-3">
                                <label for="input_2" class="form-label">Password</label>
                                <input type="text" v-model="Form.password" class="form-control" id="password" placeholder="Enter your password">
                                <span v-if="Error.password" class="text-danger">{{ Error.password[0] }}</span>
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
// import $ from "jquery";
// import * as $ from 'jquery';


import axios from 'axios'
import swal from 'sweetalert'

export default{
    name: "RegisterView",
    data(){
        return{
            Form : {
                name: "",
                email : "",
                password : ""
            },
            Error: {
                name : false,
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
                    url: 'http://127.0.0.1:8000/api/register',
                    data: {
                        name: this.Form.name,
                        email: this.Form.email,
                        password: this.Form.password,
                    }
                })
                .then((response) => {
                    console.log(response.data)
                    if(response.data.status == "error")
                    {
                        // swal ( "Oops" ,  response.data.message ,  "error" )
                        // $('#registerForm').modal;
                        this.Error.name = response.data.error.name
                        this.Error.email = response.data.error.email
                        this.Error.password = response.data.error.password
                    }
                    else
                    {
                        swal ( "Please wait" ,  "Form validating success" ,  "success" );
                        window.location.href = '/login';

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
            
        },
        
    }
}
</script>