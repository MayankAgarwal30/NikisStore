<div class="mca_chat_wrapper">
    <div class="mca_sidebar">
        <div class="mca_user_list">
            <ul>
				<?php for($i=0;$i<count($customer);$i++){ ?>
				<?php $lastmsg = $wpdb->get_var( "SELECT msg FROM $rtable WHERE user_from = ".$customer[$i]->user_id." ORDER BY msg_id DESC LIMIT 0,1" ); ?>
				<li>
                    <div class="mca_user">
                        <div class="mca_initials"><?php echo get_first_letter($customer[$i]->name); ?></div>
                        <div class="mca_user_detail">
                            <h3 class="mca_userName"><?php echo $customer[$i]->name; ?></h3>
                            <p class="mca_userLastMsg"><?php echo $lastmsg; ?></p>
                        </div>
                        <div class="mca_action">
                            <a href="" class="mca_btn admin_chat_open_h" data-cust_id="<?php echo $customer[$i]->user_id; ?>" data-name="<?php echo $customer[$i]->name; ?>" data-agent_id="<?php echo $agent_id; ?>">View History</a>
                        </div>
                    </div>
					
					<div class="moc_chat_wrapper moc_chat_win">
    
					</div>
					
                </li>
				<?php } ?>
			</ul>
        </div>
    </div>

</div>