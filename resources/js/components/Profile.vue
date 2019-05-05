<style media="screen">
  .widget-user-header{
    background-position: center center;
    background-size: cover;
    height: 200px!important;
  }
</style>
<template>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
            <!-- Widget: user widget style 1 -->
            <div class="card card-widget widget-user" style="background-image:url('./img/user-cover.jpg')">
              <!-- Add the bg color to the header using any of the bg-* classes -->
              <div class="widget-user-header text-white" style="">
                <h3 class="widget-user-username">{{this.form.name}}</h3>
                <h5 class="widget-user-desc">{{this.form.type}}</h5>
              </div>
              <div class="widget-user-image">
                <img class="img-circle" src="#" alt="User Avatar">
              </div>
              <div class="card-footer">
                <div class="row">
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">3,200</h5>
                      <span class="description-text">SALES</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4 border-right">
                    <div class="description-block">
                      <h5 class="description-header">13,000</h5>
                      <span class="description-text">FOLLOWERS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                  <div class="col-sm-4">
                    <div class="description-block">
                      <h5 class="description-header">35</h5>
                      <span class="description-text">PRODUCTS</span>
                    </div>
                    <!-- /.description-block -->
                  </div>
                  <!-- /.col -->
                </div>
                <!-- /.row -->
              </div>
            </div>
            <!-- /.widget-user -->
            <div class="col-md-12">
            <div class="card">
              <div class="card-header p-2">
                <ul class="nav nav-pills" role = "tablist">
                  <li class="nav-item"><a class="nav-link" href="#tab1" data-toggle="tab">Tab1</a></li>
                  <li class="nav-item"><a class="nav-link" href="#tab2" data-toggle="tab">Tab2</a></li>
                  <li class="nav-item"><a class="active nav-link active show" href="#settings" data-toggle="tab">Settings</a></li>

                </ul>
              </div><!-- /.card-header -->
              <div class="card-body">
                <div class="tab-content">

                  <!-- /.tab-pane -->

                  <div class="tab-pane" id="tab1">
                    <!-- tab1 content
                    //TODO Fix tab order and the way they are opened
                  -->

                    <!-- tab1 content -->
                  </div>
                  <!-- /.tab-pane -->
                  <div class="tab-pane" id="tab2">
                    <!-- tab2 content -->

                    <!-- tab2 content -->
                  </div>

                  <div class="tab-pane slide-left active" id="settings">
                    <form class="form-horizontal">
                      <div class="form-group">
                        <label for="inputName" class="col-sm-2 control-label">Name</label>
                        <div class="col-sm-12">
                          <input v-model="form.name" type="text" class="form-control" id="inputName" placeholder="Name">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputEmail" class="col-sm-2 control-label">Email</label>
                        <div class="col-sm-12">
                          <input v-model="form.email" type="email" class="form-control" id="inputEmail" placeholder="Email">
                        </div>
                      </div>

                      <div class="form-group">
                        <label for="inputExperience" class="col-sm-2 control-label">Experience</label>
                        <div class="col-sm-12">
                          <textarea v-model="form.bio" type="email" class="form-control" id="inputExperience" placeholder="Experience"></textarea>
                        </div>
                      </div>

                      <div class="form-group">
                          <label for="photo" class="col-sm-2 control-label">Profile Photo</label>
                          <div class="col-sm-12">
                              <input type="file" @change="updateProfile" name="photo" class="form-input">
                          </div>
                      </div>

                      <div class="form-group">
                            <label for="password" class="col-sm-12 control-label">Password (leave empty if not changing)</label>
                            <div class="col-sm-12">
                            <input type="password" v-model="form.password" class="form-control" id="password" placeholder="Password">
                            </div>
                        </div>

                      <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-10">
                          <button @click.prevent="updateInfo" type="submit" class="btn btn-success">Submit</button>
                        </div>
                      </div>
                    </form>
                  </div>



                  <!-- /.tab-pane -->
                </div>
                <!-- /.tab-content -->
              </div><!-- /.card-body -->
            </div>
            <!-- /.nav-tabs-custom -->
          </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
          return {
            form : new Form({
              id:'',
              name : '',
              email : '',
              password : '',
              type : '',
              bio : '',
              photo : ''
            })
          }
        },
        mounted() {
            console.log('Component mounted.')
        },
        methods:{
          updateInfo(){
            this.$Progress.start();
            this.form.put('api/profile')
            .then(()=>{


              this.$Progress.finish();
            })
            .catch(()=>{
              this.$Progress.fail();
            });
          },
          updateProfile(e){
            // console.log('Uploding file!!!');
            let file = e.target.files[0];
              console.log(file);
              let reader = new FileReader();
              // let vm = this;
              if(file['size'] < 2111775){
                reader.onloadend = (file) => {
                  // console.log('RESULT', reader.result)
                  this.form.photo = reader.result;
                }
                reader.readAsDataURL(file);
              }else{
                Swal.fire({
                  type: 'error',
                  title: 'Oops...',
                  text: 'You are uploading a large file!',
                  text: 'Mximum file size is 2MB'
                  // footer: '<a href>Why do I have this issue?</a>'
                })
              }

          }
        },
        created() {
          axios.get("api/profile").then(({ data }) => (this.form.fill(data)));
        }
    }
</script>
