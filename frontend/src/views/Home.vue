<template>
  <div id="app">
    <div>
      <input type="file" @change="onImageChange" />
    </div>
    <button @click="upload()">アップロード</button>
  </div>
</template>

<script>
import axios from "axios";
export default {
  data() {
    return {
      img: "",
      message: "",
      error: "",
    };
  },
  methods: {
    getBase64(file) {
      return new Promise((resolve, reject) => {
        const reader = new FileReader();
        reader.readAsDataURL(file);
        reader.onload = () => resolve(reader.result);
        reader.onerror = (error) => reject(error);
      });
    },
    onImageChange(e) {
      const images = e.target.files || e.dataTransfer.files;
      this.getBase64(images[0]).then((image) => (this.img = image));
    },
    upload() {
      const url = "http://localhost:8000/api/register";
      const data = {
        img: this.img,
      };
      console.log(this.img);
      axios.post(url, data).then(function (res) {
        console.log(res);
      });
    },
  },
};
</script>

<style scoped>
input {
  margin: 30px;
}
</style>