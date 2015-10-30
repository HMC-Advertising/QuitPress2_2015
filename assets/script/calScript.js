(function(){
		$("#resultCont").hide();

			var result3050= [
				"Monthly electric bill",
				 "Fill up at the gas station",
				 "Hunting & Fishing license"
			];
			var result6090= [
				 "Monthly heating billMonthly heating bill",
				 "Vet visit for your pet",
				 "Monthly Cable Bill"
			];
			var result515= [
				 "Trip to the Laundromat",
				 "Breakfast sandwich & coffee",
				 "Lunch"
			];
			var result5070= [
				 "A new video game",
				 "Yearly car registration"
			];
			var result1030= [
				 "A flu shot",
				 "A new shirt",
				 "New cell phone case"
			];

			var rand = parseInt((Math.random()*3));
			
			$("#go").on("click", function(e){
				e.preventDefault();
				$("#resultCont").show();

				var cig = $("#cigarettes").val();
				var amount = $("#amount").val();
				var pack = 20;

				var spend = (cig/pack)*amount;

				var spendResult = spend.toFixed(2);
				$("#resultsInput").val(spendResult);
				//console.log(rand);
				
				
				if(spend < 10){
					$("#useInput").text(result515[rand]);

				}
				else if(spend >60 && spend <90){
					$("#useInput").text(result6090[rand]);
				}
				else if(spend >10 && spend <30){
					$("#useInput").text(result1030[rand]);
				}
				else if(spend >30 && spend <50){
					$("#useInput").text(result3050[rand]);
				}
				else{
					if(rand >= 2){
						rand = 1;
					}
					$("#useInput").text(result5070[rand]);
				}


			})

			$("#clear").on("click", function(e){
				e.preventDefault();
				$("#cigarettes").val("");
				$("#amount").val("");
				$("#resultsInput").val("");
				$("#resultCont").hide();

			})

}())

function precise_round(num,decimals){ //this is not my function found on Stackover flow, from user Miguel
	return Math.round(num*Math.pow(10,decimals))/Math.pow(10,decimals);
} 
