<div class="container">
    <div class="row">
        <div class="col-md-6">
            <h2>Sistem Perusahaan Colcom</h2>
            <h3>Pengelolaan Karyawan & digital absensi</h3>

            <div class="akses-button">
                <?php

                    $dataAnchor = ['class' => 'btn btn-outline-primary'];

                    // echo anchor('user/login', 'LOGIN', $dataAnchor);
                    echo anchor('user/register', 'DAFTAR', $dataAnchor);
                ?>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card frame-form-colcom">
                <div class="card-header">Login</div>
                <div class="card-body">

                    <?php if($this->session->flashdata('pesan')): ?>
                        <div class="alert <?= $this->session->flashdata('alert'); ?>"><?php echo $this->session->flashdata('pesan'); ?></div>
                    <?php endif;?>

                    <?php
                        echo form_open(base_url('login/proses'), ['class' => 'form-colcom']);
                    ?>
                    
                    <div class="form-group row">
                        <label for="email" class="col-3">Email</label>
                        <div class="col-9">
                            <?php
                                $data = ['name' => 'email',
                                        'id' => 'email',
                                        'class' => 'form-control',
                                        'value' => set_value('email'),
                                        'placeholder' => 'Email'
                                        ];
                                echo form_input($data);
                                echo form_error('email');
                            ?>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="password" class="col-3">Password</label> 
                        <div class="col-9">
                            <?php
                            //password sengaja tidak dikasih set_value supaya user isi lagi
                                $data = ['name' => 'password',
                                        'id' => 'password',
                                        'class' => 'form-control',
                                        'placeholder' => 'Password'
                                        ];
                                echo form_password($data);
                                echo form_error('password');
                            ?>
                        </div>
                    </div>

                    <?php
                        echo form_submit(['name' => 'submit', 'class' => 'btn btn-dark btn-block'], 'Login');

                        echo form_close()
                    ?>
                </div>    
            </div>
        </div>
    </div>
</div>