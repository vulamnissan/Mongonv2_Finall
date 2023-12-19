<div id="container_loader">
<div class="loader">
  <div class="snow">
      <span style="--i:11"></span>
      <span style="--i:12"></span>
      <span style="--i:15"></span>
      <span style="--i:17"></span>
      <span style="--i:18"></span>
      <span style="--i:13"></span>
      <span style="--i:14"></span>
      <span style="--i:19"></span>
      <span style="--i:20"></span>
      <span style="--i:10"></span>
      <span style="--i:18"></span>
      <span style="--i:13"></span>
      <span style="--i:14"></span>
      <span style="--i:19"></span>
      <span style="--i:20"></span>
      <span style="--i:10"></span>
      <span style="--i:18"></span>
      <span style="--i:13"></span>
      <span style="--i:14"></span>
      <span style="--i:19"></span>
      <span style="--i:20"></span>
      <span style="--i:10"></span>
  </div>
</div>
</div>
<style>
#container_loader{
    background-color: black;
    display: flex;
    justify-content: center;
    position: relative;

    width: 100%;
    height: 100%;
}

.loader {
  top: 50%;
  position: relative;
  width: 90px;
  height: 20px;
  background: rgb(255, 255, 255);
  border-radius: 100px;
  z-index: 4;
}

.loader::before {
  content: "";
  position: absolute;
  top: -14px;
  left: 14px;
  width: 30px;
  height: 30px;
  background: rgb(255, 255, 255);
  border-radius: 50%;
  box-shadow: rgb(255, 255, 255) 28px -5px 0px 5px;
}

.snow {
  position: relative;
  display: flex;
  z-index: 4;
}

.snow span {
  position: relative;
  width: 3px;
  height: 3px;
  background: #fff;
  margin: 0 2px;
  border-radius: 50%;
  animation: snowing 5s linear infinite;
  animation-duration: calc(15s / var(--i));
  transform-origin: bottom;
}

@keyframes snowing {
  0% {
    transform: translateY(0px);
  }

  70% {
    transform: translateY(100px) scale(1);
  }

  100% {
    transform: translateY(100px) scale(0);
  }
}


</style>