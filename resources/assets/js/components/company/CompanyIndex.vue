<template>
 <div class="row">
    <div class="col-md-8 col-md-offset-2">
        <div class="panel panel-default">
            <div class="panel-heading">Company</div>

            <div class="panel-body">
                <table class="table table-bordered">
                    <thead>
                        <th>Name</th>
                        <th>Jenis</th>
                    </thead>
                    <tbody v-if="companies.length" class="data-ada">
                        <tr v-for="company, index in companies" >

                            <td>{{ company.name }}</td>
                            <td>{{ company.jenis }}</td>
                            <td> 
                             <router-link :to="{name: 'editCompany', params: {id: company.id}}" class="btn btn-xs btn-default" v-bind:id="'edit-' + company.id" >
                                Edit 
                            </router-link> <a href="#"
                            class="btn btn-xs btn-danger" v-bind:id="'delete-' + company.id"
                            v-on:click="deleteEntry(company.id, index,company.name)">
                            Delete
                        </a></td>


                    </tr>
                </tbody>
                <tbody class="data-tidak-ada" v-else>
                  <tr ><td colspan="4"  class="text-center">Tidak Ada Data</td></tr>
              </tbody>
          </table>

      </div>
  </div>
</div>
</div>
</template>


