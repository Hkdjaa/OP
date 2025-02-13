<script>
        document.getElementById('category_id').addEventListener('change', function() {
            const categoryId = this.value;
            const subcategorySelect = document.getElementById('subcategory_id');
            subcategorySelect.innerHTML = '<option value="">Choisir une sous-catégorie</option>';

            if (categoryId) {
                fetch(`/api/subcategories/${categoryId}`)
                    .then(response => response.json())
                    .then(data => {
                        data.forEach(subcategory => {
                            const option = document.createElement('option');
                            option.value = subcategory.id;
                            option.textContent = subcategory.name;
                            subcategorySelect.appendChild(option);
                        });
                    });
            }
        });
    </script>
	<script src="{{ asset('js/app.min.js')}}"></script>
	<script src="{{ asset('js/theme/default.min.js' )}}"></script>
	<!-- ================== END BASE JS ================== -->
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('plugins/d3/d3.min.js')}}"></script>
	<script src="{{ asset('plugins/nvd3/build/nv.d3.min.js')}}"></script>
	<script src="{{ asset('plugins/jvectormap-next/jquery-jvec/tormap.min.js')}}"></script>
	<script src="{{ asset('plugins/jvectormap-next/jquery-jvectormap-world-mill.js')}}"></script>
	<script src="{{ asset('plugins/apexcharts/dist/apex/charts.min.js')}}"></script>
	<script src="{{ asset('plugins/moment/min/moment.min.js')}}"></script>
	<script src="{{ asset('plugins/bootstrap-daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{ asset('js/demo/dashboard-v3.js')}}"></script>
	
	<!-- ================== BEGIN PAGE LEVEL JS ================== -->
	<script src="{{ asset('jplugins/highlight.js/highlight.min.js')}}"></script>
	<script src="{{ asset('jjs/demo/render.highlight.js')}}"></script>
	<!-- ================== END PAGE LEVEL JS ================== -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
