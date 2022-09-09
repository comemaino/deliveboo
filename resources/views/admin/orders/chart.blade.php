@extends('layouts.dashboard')

@section('content')
	<h2 class="py-4 bg-white mb-0 text-center">Pagina Statistiche ordini</h2>
	<div class="bg-white p-3">
		<canvas id="myChart" class="mb-5 "></canvas>
		<canvas id="myChart-2"></canvas>
		{{-- {{dd($orders_amount)}} --}}
	</div>

	<script>
		let _ydata = JSON.parse('{!! json_encode($orders_n) !!}');
		let _xdata = JSON.parse('{!! json_encode($months) !!}');
		let _ysales = JSON.parse('{!! json_encode($sales) !!}');

		const ctx = document.getElementById('myChart');
		const myChart = new Chart(ctx, {
			type: 'bar',
			data: {
				labels: _xdata,
				datasets: [{
					label: 'N° ordini/mese',
					data: _ydata,
					backgroundColor: [
						'rgba(255, 99, 132, 0.2)',
						'rgba(54, 162, 235, 0.2)',
						'rgba(255, 206, 86, 0.2)',
						'rgba(75, 192, 192, 0.2)',
						'rgba(153, 102, 255, 0.2)',
						'rgba(255, 159, 64, 0.2)'
					],
					borderColor: [
						'rgba(255, 99, 132, 1)',
						'rgba(54, 162, 235, 1)',
						'rgba(255, 206, 86, 1)',
						'rgba(75, 192, 192, 1)',
						'rgba(153, 102, 255, 1)',
						'rgba(255, 159, 64, 1)'
					],
					borderWidth: 1
				}]
			},
			options: {
				scales: {
					y: {
						beginAtZero: true
					}
				}
			}
		});
		const ctx2 = document.getElementById('myChart-2');
		const myChart2 = new Chart(ctx2, {
			type: 'line',
			data: {
				labels: _xdata,
				datasets: [{
					label: '€ incassi/mese',
					data: _ysales,
				}]
			},
		})
	</script>
@endsection
