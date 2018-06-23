<div id="js-quiz-app" class="container">
	<div class="row">
		<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
			<p class="description">
				السؤال 1
			</p>
		</div>
	</div>
	<div class="row">
		<div class="col-lg-offset-3 col-lg-6 col-md-offset-3 col-md-6 col-sm-offset-1 col-sm-10 col-xs-12">

			<div class="panel panel-primary" v-for="(question, item) in questions">

				<div class="panel-heading question">{{item+1}} : {{ question['content'] }}</div>

				<div class="panel-body">
					<form class="form-horizontal form-horizontal--customized">
						<div class="form-group" v-for="choice in question['choices']">
							<div class="col-md-offset-1 col-md-10">
								<div class="form-check">
									<input class="form-check-input" :id="choice['id']" :name="'question-'+question['id']" :value="choice['id']" type="radio"/>
									<label class="form-check-label choice" :for="choice['id']">
										{{ choice['content'] }}
									</label>
		                        </div>
	                    	</div>
	                    </div>

						<div class="form-group">
	                    	<div class="col-md-12">
	                    		<center>
		                    		<button type="submit" class="btn btn-primary btn-arab">
				                        إجابة
				                    </button>
				                </center>
			                </div>
			            </div>
					</form>
				</div><!-- .panel-body -->

			</div><!-- .panel -->

		</div><!-- .col-* -->
	</div><!-- .row -->

</div><!-- .container -->