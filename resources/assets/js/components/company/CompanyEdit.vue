
<template>
    <div class="row" >
    <div class="col-md-8 col-md-offset-2">
        <ol class="breadcrumb">
            <li><router-link :to="{name: 'indexCompany'}" >Companies</router-link></li>
            <li class="active" >Edit Company</li>    
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">Edit Company</div>
            <div class="panel-body">
    
                <form v-on:submit.prevent="saveForm()" class="form-horizontal"> 
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Name</label>
                        <div class="col-md-4">
                            <input class="form-control" required autocomplete="off" placeholder="Name" type="text" v-model="company.name" name="name"  autofocus="">
                            <span v-if="errors.name" class="label label-danger">{{ errors.name[0] }}</span>
                            
                        </div>
                    </div> 
                    <div class="form-group">
                        <label for="name" class="col-md-2 control-label">Jenis</label>
                        <div class="col-md-4">
                            <selectize-component v-model="company.jenis" :settings="settings"> 
                                    <option value="0"  >Kecil</option>
                                    <option value="1"  >Besar</option>
                                </selectize-component>
                            <span v-if="errors.jenis" class="label label-danger">{{ errors.jenis[0] }}</span>
                            
                        </div>
                    </div> 
                <div class="form-group">
                    <div class="col-md-4 col-md-offset-2">
                        <button class="btn btn-primary" id="btnSimpancompany" type="submit">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
</div>
</template>

<script>
export default {
    data: function () {
        return {
            errors: [],
            companyId: null,
            url : window.location.origin + window.location.pathname,
            company: {
                name: '',
                jenis: ''
            },
            message : '',
            settings: {
                placeholder: 'Pilih Jenis Perusahaan'
            } 
        }
    },
    mounted(){
        this.getData();
    },
    methods: {
        saveForm() {
            var app = this;
            var newCompany = app.company;
             axios.patch(app.url+'/' + app.companyId, newCompany)
            .then(function (resp) {
                app.message = 'Sukses : Berhasil Menambah company '+ app.company.name;
                app.alert(app.message);
                app.company.name = ''
                app.company.jenis = ''
                app.errors = '';
                app.$router.replace('/');

            })
            .catch(function (resp) {
                app.success = false;
                app.errors = resp.response.data.errors;
            });
        },
        alert(pesan) {
          this.$swal({
              title: "Berhasil!",
              text: pesan,
              icon: "success",
          });
      },
      getData(){
        let app = this;
        let id = app.$route.params.id;
        app.companyId = id;

        axios.get(app.url+'/' + id +'/edit')
        .then(function (resp) {
            app.company = resp.data;
        })
        .catch(function () {
            alert("Could not load your company")
        });
      }

  }
}
</script>
