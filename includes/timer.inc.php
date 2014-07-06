<script type="text/javascript">
	var count=200;
	var counter=setInterval(timer, 1000); //1000 will  run it every 1 second

	function timer() {
		count=count-1;
		
		if (count <= 0) {
			clearInterval(counter);
			
		return;
	}

  document.getElementById("timer").innerHTML=count + " secs";
}
</script>