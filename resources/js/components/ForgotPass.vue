<template>
<div class="container-fluid shades">
    <odd-header></odd-header>

     <form action="#" class="ml-4 mr-4 more-mt">
        <form-comp class="white-text" iD="username" formType="text" placeHolder="bobrisky514" formName="Username"></form-comp>

        <button type="submit" class="btn btn-primary btn-block">Login</button>
    </form>

    <div class="row text-center more-mt">
        <div class="col-12">
            <h6 class="white-text">Don't have an account? <a class="signup-link" href="#">Create One Now</a></h6>
        </div>
    </div>
</div>
   
</template>

<script>
export default {
    
}
</script>

<style>

    .signup-link {
        color: rgb(57, 185, 57);
    }
    .white-text {
        color: white;
    }
    .shades {
        background-color: #00000094;
        height: 104vh;
    }
    .more-mt{
        margin-top: 8rem !important;
    }

    body {

        background-image: url(../../img/bg_login.png);
        background-repeat: no-repeat;
        background-size: cover;
    }



</style>