<div class="row">

	<div class="col-sm-12">
		<div>
			<div class="connect-sorting">

				<h5 class="text-center mb-3">RESUMEN DE VENTA</h5>

				<div class="connect-sorting-content">
					<div class="card simple-title-task ui-sortable-handle">
						<div class="card-body">

							<div class="task-header">
								<div>
									<h3>TOTAL: Q {{number_format($total,2)}}</h3>
									<input type="hidden" id="hiddenTotal" value="{{$total}}">
								</div>
								<div>
									<h5 class="mt-3">Articulos: {{$itemsQuantity}}</h5>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>
</div>
