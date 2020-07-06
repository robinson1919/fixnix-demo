<template>
  <div class="home">
    <v-row
      align="center"
      justify="center"
      v-for="(item, i) in response" :key="i"
      class="pb-5"
    >
      <v-card
        class="mx-auto"
        max-width="950"
        width="750"
        tile        
      >
        <v-card-title primary-title class="secondary text-center"> 
          <span class="white--text font-weight-bold headline">{{item.compliance_name}}</span>
        </v-card-title>
        <v-card-text class="headline font-weight-bold">
          <template>
            <v-row justify="center">
              <v-expansion-panels popout>
                <v-expansion-panel>
                <!-- <v-expansion-panel
                  v-for="(item,i) in insideData"
                  :key="i"
                > -->
                  <v-expansion-panel-header>{{JSON.parse(item.compliance_description)[2][0]}} - {{JSON.parse(item.compliance_description)[2][1]}}</v-expansion-panel-header>
                  <v-expansion-panel-content>
                    <!-- inside acordion start -->
                    <template>
                      <v-row justify="center">
                        <v-expansion-panels popout>
                          <v-expansion-panel
                            v-for="(item,i) in insideData"
                            :key="i"
                          >
                            <v-expansion-panel-header>{{item[0]}} - {{item[1]}} </v-expansion-panel-header>
                            <v-expansion-panel-content>
                              {{item[4]}}
                            </v-expansion-panel-content>
                          </v-expansion-panel>
                        </v-expansion-panels>
                      </v-row>
                    </template>
                    <!-- inside acordion End -->
                  </v-expansion-panel-content>
                </v-expansion-panel>
              </v-expansion-panels>
            </v-row>
          </template>
        </v-card-text>
        <v-card-actions>
          <v-btn text color="red">Delete</v-btn>
        </v-card-actions>
      </v-card>
          
    </v-row> 
    
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  data: () => ({
    complianceName: '',
    insideData: '',
    response: '',
    title: ''
  }),
  created() {
    this.loadData();
  },
  methods: {
    loadData(){
      const proxy = 'https://cors-anywhere.herokuapp.com/';
      const api = 'http://127.0.0.1:8000/api/compliance/loadExcel';
      axios.get(api).then((response) => {
        var res = response.data;
        this.response = res;
        res.forEach(el => {
          this.complianceName = el.compliance_name;
          this.insideData = JSON.parse(el.compliance_description);
        });
        
        this.insideData.splice(0,3);

        console.log(this.insideData)
        
        
        // for(var i=2; i<this.insideData.length; i++){
        //   console.log(this.insideData[i])
        // }

      })
    }
  },
}
</script>
