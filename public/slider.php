<div class="top-profiles">
											<div class="pf-hd">
												<h3>Top Profiles</h3>
												<i class="la la-ellipsis-v"></i>
											</div>
											<div class="profiles-slider">
												<?php
												$query = $koneksi->query("SELECT * FROM tb_user");
												while ($user = $query->fetch_array()) {
													if ($user['kode' != $_SESSION['user']['kode']] ) {//jika bukan user yang sedang login
												?>
												<div class="user-profy">
												<?php
													 
													 if ($user['foto'] != "") {
														 echo "<img src='profile/" . $user['foto'] . "' width='50' height='50'/>";
													 }else {
														 echo "<img src='images/p.jpg'/>";
													  }           
													 
												 ?>
													<h3><?php echo $user['nama_user']; ?></h3>
													<span>
														<?php if ($user['pekerjaan'] != "") {
															 echo $user['pekerjaan']; 
															} else {
															 echo "Tidak ada";
															}

														?>
													</span>

													<ul>
													
													</ul>

													<ul>
														<li>
															<?php 
															$follower = @$_SESSION['user']['id_user'];
															$following = $user['kode'];
															$follow_connect = $koneksi->query("SELECT * FROM tb_user_follow 
															WHERE kode = '$follower' AND following = '$following'");
															$follow_count = $follow_connect->num_rows;
															?>
														</li>
													</ul>

													<ul>
														<li><a href="#" title="" class="envlp"><img src="images/envelop.png" alt=""></a></li>
														<li><a href="#" title="" class="hire">here</a></li>
													</ul>
				
													<ul>
														<li>
															<form action="" method="post">
																<input type="hidden" name="id" value="<?php echo $following ?>">
																<?php 
																if ($follow_count > 0) {
																	echo '<button><a href="unfollow.php?kode=' . $user["kode"] . '"class="follow bg-secondary">Unfollow</a></button>';
																}else {
																	echo "<input type='submit' class='follow p-1 rounded text-light' name='sub' style='cursor:pointer' value='Follow'>";
																}
																?>
															</form>
														</li>
													</ul>

													<a href="#" title="">View Profile</a>
												</div><!--user-profy end-->
												<?php
												$tz = 'Asia/Jakarta';
												$dt = new DateTime("now", new DateTimeZone($tz));
												$date = $dt->format('Y-m-d G:i:s');//date('Y-m-d H:i:s');//2010-10-10 10:10:10

												$id = @$_POST['id'] ?? "";
												$sub = $_POST['sub'] ?? "";
												

												//Gak bisa//
												//if ($sub) {
												// 	$state = $koneksi->prepare("INSERT INTO tb_user_follow (kode, following, subscribed) VALUES (?, ?, ?)");
												// 	$state->bind_param("sss", $folLower, $id, $date);

												// 	if ($state->execute()) {
												// 		echo "<script>location='index.php';</script>";
												// 		exit();
												// 	}
												// }

												if ($sub) {
													$state = $koneksi->query("INSERT INTO tb_user_follow (kode, following, subscribed) VALUES ( $follower, $id, $date)");
													$state->bind_param("sss", $folLower, $id, $date);

													if ($state->execute()) {
														echo "<script>location='index.php';</script>";
														exit();
													}
												}
												?>

												<?php 
													} 
												}
												?>


											</div><!--profiles-slider end-->
										</div><!--top-profiles end-->