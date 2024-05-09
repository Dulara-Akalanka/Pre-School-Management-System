
<html>
	<head>
		<meta charset="utf-8">
		<title>Invoice</title>
		<!-- <link rel="stylesheet" href="recipt4.css"> -->
        <link rel="stylesheet" href="{{ asset('receipt4.css') }}">

		<!-- <link rel="license" href="https://www.opensource.org/licenses/mit-license/"> -->
		<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
		<script src="resources/js/recipt4.js"></script>
	</head>

	
	<body>
	<div id="capture_{{$payments->id}}">
	<!-- style="width:750px; height:600px;" -->
	<div >
		<header>
			<h1>Invoice</h1>
			<address contenteditable>
				<p>Anjana Little Friends</p>
				<p>217/D Iddagodalla road Kimbulapitiya,<br>Negombo
				<p>0312221053</p>
			</address>
			<span><img alt="" src="{{asset('images/logo_trans.png')}}" height="150px" width="150px"></span>
		</header>
		<article>
			<!-- <h1>Recipient</h1> -->
			<!-- <address contenteditable>
				<p>Some Company<br>c/o Some Guy</p>
			</address> -->
			<table class="meta">
				<tr>
					<th><span contenteditable>Invoice #</span></th>
					<td><span contenteditable>{{$payments->invoice_id}}</span></td>
				</tr>
				<tr>
					<th><span contenteditable>Date</span></th>
					<td><span contenteditable>January 1, 2012</span></td>
				</tr>
				<!-- <tr>
					<th><span contenteditable>Amount Due</span></th>
					<td><span id="prefix" contenteditable>RS:</span><span>600.00</span></td>
				</tr> -->
			</table>
			<table class="inventory">
				<thead>
					<tr>
						<th><span contenteditable>ID</span></th>
						<th><span contenteditable>Full Name</span></th>
						<th><span contenteditable>Reason</span></th>
						<!-- <th><span contenteditable>Amount</span></th> -->
						<th><span contenteditable>Amount</span></th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td>
                            <!-- <a class="cut">- -->   
                        </a><span contenteditable></span>{{$payments->student_id}}</td>
						<td><span contenteditable></span>{{$payments->student_name}}</td>
                        <td><span contenteditable></span>{{$payments->payment_type}}</td>
						<td><span data-prefix>RS:</span><span contenteditable></span>{{$payments->amount}}</td>
                       
						
					</tr>
				</tbody>
			</table>
			<!-- <a class="add">+</a> -->
			<table class="balance">
				<tr>
					<th><span contenteditable>Total</span></th>
					<td><span data-prefix>RS:</span><span>{{$payments->amount}}</span></td>
				</tr>
				<!-- <tr>
					<th><span contenteditable>Amount Paid</span></th>
					<td><span data-prefix>$</span><span contenteditable>0.00</span></td>
				</tr> -->
				<!-- <tr>
					<th><span contenteditable>Balance Due</span></th>
					<td><span data-prefix>$</span><span>600.00</span></td>
				</tr> -->
			</table>
		</article>
		
</div>

		
</div>
</div>
<div>
<button class="btn btn-success mt-4 float-right align-text-bottom" onclick="captureDivAsImage('{{$payments->id}}')">Download</button>
		<!-- <button class="btn btn-primary mt-4 float-right align-text-bottom" type="submit">Submit Form</button> -->
		</div>
		<!-- <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button> -->
		
        
	</body>
</html>

<script src="{{asset('js/html2canvas.js')}}" type="text/javascript"></script>
<script src="https://code.jquery.com/jquery-3.5.1.js" type="text/javascript"></script>

<script>
	    function captureDivAsImage(id) {
    html2canvas(document.getElementById("capture_" + id)).then(function(canvas) {
        var link = document.createElement("a");
        link.download = id + ".jpeg";
        link.href = canvas.toDataURL("image/jpeg", 0.9);
        link.click();
    });
}
</script>