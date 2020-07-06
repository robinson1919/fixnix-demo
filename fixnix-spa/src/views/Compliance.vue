<template>
  <div class="home">
    <v-row
      align="center"
      justify="center"
    >
      <h2>Compliance component</h2>
      
    </v-row> 
    <v-row
      align="center"
      justify="center"
    >
      <template>
        <v-file-input show-size counter multiple label="File input" v-model="data"></v-file-input>
        
        <v-row >
          <v-btn class="ml-5" color="success" @click="uploadFile">Submit</v-btn>
        </v-row>
      </template>
      
    </v-row> 

    
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios'
export default {
  data:() => ({
    data: '',
    // csrf: document.querySelector('meta[name="csrf-token"]').getAttribute('content')
    csrf: ''
  }),
  methods: {
    uploadFile(){
      console.log(this.data[0])
      this.formData = new FormData();
      this.formData.append('name', this.data[0].name);
      this.formData.append('file', this.data[0]);


      // axios.get('http://127.0.0.1:8000/api/compliance/loadExcel').then((response) => {
      //   console.log(response)
      // })

      axios.post('http://127.0.0.1:8000/api/compliance', this.formData
      , {
        headers: {
          'Content-Type': 'multipart/form-data',
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
      }
      ).then((response) => {
        this.data = '';
        console.log(response);
      })
    }
  },
  
}
</script>
