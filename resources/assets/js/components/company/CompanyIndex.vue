<style scoped>
.pencarian {
  color: red;
 
  float: right;
  padding-bottom: 10px;
}
</style>

<template>
 <div class="row">
    <div class="col-md-8 col-md-offset-2">
         <ol class="breadcrumb">
            <li  class="active"><router-link :to="{name: 'indexCompany'}" >Companies</router-link></li>  
        </ol>
        <div class="panel panel-default">
            <div class="panel-heading">Companies</div>

            <div class="panel-body">

                     <p> <router-link :to="{name: 'createCompany'}" class="btn btn-primary">Create Company</router-link></p>
              <div class="pencarian">
                  <input type="text" class="form-control" name="pencarian"placeholder="Pencarian"  v-model="pencarian" >
              </div>
                <table class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Jenis</th>
                        <th>Aksi</th>
                    </thead>
                    <tbody v-if="companies.length" class="data-ada">
                        <tr v-for="company, index in companies" >

                            <td>{{ company.name }}</td>
                            <td v-if="company.jenis == 1">Besar</td>
                            <td v-else>Kecil</td>
                            <td> 
                             <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default" v-bind:id="'edit-' + company.id" >
                                Edit 
                            </router-link> <a href="#"
                            class="btn btn-xs btn-danger" v-bind:id="'delete-' + company.id"
                            v-on:click="deleteCompany(company.id, index,company.name)">
                            Delete
                        </a></td>


                    </tr>
                </tbody>
                <tbody class="data-tidak-ada" v-else>
                  <tr ><td colspan="4"  class="text-center">Tidak Ada Data</td></tr>
              </tbody>
          </table>
            <vue-simple-spinner v-if="loading"></vue-simple-spinner>
            <div align="right"><vue-pagination :data="companiesData" v-on:pagination-change-page="getCompanies" :limit="3"></vue-pagination></div>

      </div>
  </div>
</div>
</div>
</template>

<script>
export default {
  data: function () {
    return {
      companies: [],
      companiesData: {},
      url : window.location.origin + window.location.pathname,
      loading: true,
      pencarian: ''
    }
  },
  mounted() {
    var app = this;
    app.getCompanies();

  },
  watch: {
        // whenever question changes, this function will run
        pencarian: function (q) {
          if (q != '') {
            this.searchCompany()  
          }
          else {
            this.getCompanies()
          }
          
        }
      },
      methods: {
        getCompanies(page) {
          var app = this;
          if (typeof page === 'undefined') {
            page = 1;
          }
          axios.get(app.url+'/show-all?page='+page)
          .then(function (resp) {
            app.companies = resp.data.data;
            app.companiesData = resp.data;
            app.loading = false;
          })
          .catch(function (resp) {
            console.log(resp);
            app.loading = false;
            alert("Could not load companies");
          });
        },
        searchCompany(page){
          var app = this;
          if (typeof page === 'undefined') {
            page = 1;
          }
          axios.get(app.url+'/search?q='+app.pencarian+'&page='+page)
          .then(function (resp) {
            app.companies = resp.data;
            app.companiesData = [];
          })
          .catch(function (resp) {
            console.log(resp);
            alert("Could not load Company");
          });
        },
         alert(pesan) {
          this.$swal({
            title: "Berhasil Menghapus Company!",
            text: pesan,
            icon: "success",
          });
        },
         deleteCompany(id, index,name) {
          if (confirm("Yakin Ingin Menghapus Company "+name+" ?")) {
            var app = this;
            axios.delete(app.url+'/' + id)
            .then(function (resp) {
              app.getCompanies();
              app.alert("Berhasil Menghapus Company "+name)
            })
            .catch(function (resp) {
              alert("Could not delete company");
            });
          }
        }
      }
    }
    </script>


