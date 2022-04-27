<?php

namespace App\Controllers;

use App\Models\UserModel;
use Myth\Auth\Password;
use Config\Email;

class Admin extends BaseController
{
    protected $UserModel;

    public function __construct()
    {
        $this->UserModel = new UserModel();
    }

    // Dashboard
    // ------------------------------------------------------------------------
    public function index()
    {
        if (logged_in()) {
            $data = [
                'title' => 'Dashboard',
                'page' => 'dashboard',
            ];
            return view('dashboard/index', $data);
        } else {
            return redirect()->to('/login');
        }
    }
    // ------------------------------------------------------------------------

    // Profile
    // ------------------------------------------------------------------------
    public function indexProfile()
    {
        $db = \Config\Database::connect();
        $user = $this->UserModel->find(user_id());
        $builder = $db->table('auth_groups_users');
        $role = $builder->join('auth_groups', 'auth_groups.id=auth_groups_users.group_id', 'left')
            ->where('user_id', user_id())->get()->getRowArray();
        $data = [
            'title' => 'Profil Pengguna',
            'page' => 'profile',
            'user' => $user->toArray(),
            'role' => $role,
            'validation' => \Config\Services::validation(),
        ];
        // dd($data);
        return view('profile/index', $data);
    }
    public function profileEdit()
    {
        if ($this->request->getPost('username') == user()->username) {
            $ruleUsername = 'required';
        } else {
            $ruleUsername = 'required|alpha_numeric_space|min_length[3]|max_length[30]|is_unique[users.username]';
        }
        if (!$this->validate([
            'username' => [
                'label' => 'Username',
                'rules' => $ruleUsername,
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_numeric_space' => '{field} hanya boleh berisi alphabet, angka, dan spasi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                    'is_unique' => '{field} sudah digukan.',
                ]
            ],
            'fullname' => [
                'label' => 'Nama lengkap',
                'rules' => 'required|alpha_space|min_length[3]|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'alpha_space' => '{field} hanya boleh berisi alphabet dan spasi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'gender' => [
                'label' => 'Jenis kelamin',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'phone' => [
                'label' => 'No HP',
                'rules' => 'required|numeric|min_length[8]|max_length[16]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'numeric' => '{field} hanya boleh berisi number.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
            'address' => [
                'label' => 'Alamat',
                'rules' => 'required|min_length[3]|max_length[250]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'min_length' => '{field} minimal berisi {param} karakter.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'uprofil')->withInput();
        } else {
            $data = [
                'id' => user_id(),
                'username' => $this->request->getPost('username'),
                'fullname' => $this->request->getPost('fullname'),
                'gender' => $this->request->getPost('gender'),
                'phone' => $this->request->getPost('phone'),
                'address' => $this->request->getPost('address'),
            ];
            // dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Data Profil Berhasil Diupdate');
            return redirect()->back()->with('tag', 'uprofil');
        }
    }
    public function profileEditImage()
    {
        // dd($this->request->getFile('image_user'));
        if (!$this->validate([
            'image_user' => [
                'label' => 'Foto profil',
                'rules' => 'uploaded[image_user]|max_size[image_user,4096]|is_image[image_user]|mime_in[image_user,image/png,image/jpg,image/jpeg,image/gif]',
                'errors' => [
                    'uploaded' => '{field} harus diisi.',
                    'max_size' => '{field} ukuran maksimal 4MB.',
                    'is_image' => '{field} yang dipilih bukan gambar.',
                    'mime_in' => '{field} yang dipilih bukan gambar.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'ufoto')->withInput();
        } else {
            $fileProfil = $this->request->getFile('image_user');
            $oldImage = user()->image_user;
            $id = user_id();
            $email = $this->UserModel->find($id);
            if ($fileProfil->getError() == 4) {
                $namaFoto = $oldImage;
            } else {
                if (file_exists("uploads/image_user/" . $oldImage)) {
                    if ($oldImage != 'default.jpg') {
                        unlink("uploads/image_user/" . $oldImage);
                    }
                }
                $namaFoto = url_title($email->email, '_', true) . '_image_user.' . $fileProfil->getExtension();
                $fileProfil->move('uploads/image_user', $namaFoto);
                $namaFoto = $fileProfil->getName();
            }
            $data = [
                'id' => user_id(),
                'image_user' => $namaFoto
            ];
            // 			dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Foto Profil Berhasil Diupdate');
            return redirect()->back()->with('tag', 'ufoto');
        }
    }
    public function profileEditPassword()
    {
        if (!$this->validate([
            'password_lm' => [
                'label' => 'Password lama',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_br' => [
                'label' => 'Password baru',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ]
            ],
            'password_br2' => [
                'label' => 'Ulangi password',
                'rules' => 'required|matches[password_br]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'matches' => '{field} tidak cocok.',
                ]
            ],
        ])) {
            return redirect()->back()->with('tag', 'upassword')->withInput();
        } else {
            $passLama = $this->request->getPost('password_lm');
            $check = Password::verify($passLama, user()->password_hash);
            if ($check == false) {
                session()->setFlashdata('message_error', 'Password Lama Tidak Cocok');
                return redirect()->back()->with('tag', 'upassword')->withInput();
            }
            $passBaru = Password::hash($this->request->getPost('password_br'));
            $data = [
                'id' => user_id(),
                'password_hash' => $passBaru
            ];
            // dd($data);
            $this->UserModel->save($data);
            session()->setFlashdata('message_success', 'Password Berhasil Diubah');
            return redirect()->to('/admin/profile')->with('tag', 'upassword');
        }
    }
    // ---------------------------------------------------------------------------------
    // End Profile

    // Setting Apps
    // ---------------------------------------------------------------------------------
    public function indexApps()
    {
        $appsModel = new \App\Models\AppsModel();
        $data = [
            'title' => 'Tambah Aplikasi',
            'page' => 'apps',
            'apps' => $appsModel->orderBy('conf_order', 'ASC')->find(),
            'validation' => \Config\Services::validation()
        ];
        return view('apps/index', $data);
    }
    public function updateApps()
    {
        $validation = \Config\Services::validation();
        $pesan = [];
        $appsModel = new \App\Models\AppsModel();
        $apps = $appsModel->orderBy('conf_order', 'ASC')->find();
        if ($this->validate($this->rulesValidationApps())) {
            foreach ($apps as $app) {
                $data = [];
                if ($app['conf_type'] == 'text' || $app['conf_type'] == 'textarea') {
                    $data = [
                        'conf_char' => $app['conf_char'],
                        'conf_value' => $this->request->getPost($app['conf_char']),
                    ];
                } elseif ($app['conf_type'] == 'img') {
                    if ($this->request->getPost($app['conf_char']) != "undefined") {
                        $imageApps = $this->request->getPost($app['conf_char']);
                        $imageApps = str_replace('data:image/png;base64,', '', $imageApps);
                        $imageApps = str_replace(' ', '+', $imageApps);
                        $dataImage = base64_decode($imageApps);
                        $imageName = $app['conf_char'] . '_' . time() . '.png';
                        $pathName = 'assets/welcome/img/' . $imageName;
                        file_put_contents($pathName, $dataImage);
                        if (file_exists($app['conf_value'])) {
                            unlink($app['conf_value']);
                        }
                        $data = [
                            'conf_char' => $app['conf_char'],
                            'conf_value' => $pathName,
                        ];
                    }
                }

                if ($data != []) {
                    $query = $appsModel->save($data);
                }
            }
            if ($query) {
                session()->setFlashdata('message_success', 'Data Aplikasi Berhasil Diubah');
                echo json_encode(array('status' => 200, 'pesan' => 'Berhasil diubah !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal diubah !!'));
            }
        } else {
            foreach ($apps as $app) {
                $pesan[$app['conf_char']] = $validation->getError($app['conf_char']);
            }
            echo json_encode(array('status' => 400, 'pesan' => $pesan));
        }
    }
    private function rulesValidationApps()
    {
        $config = [];
        $appsModel = new \App\Models\AppsModel();
        $apps = $appsModel->orderBy('conf_order', 'ASC')->find();
        foreach ($apps as $app) {
            if ($app['conf_type'] == 'text' || $app['conf_type'] == 'textarea') {
                $config[$app['conf_char']] = [
                    'label' => $app['conf_name'],
                    'rules' => 'required',
                    'errors' => [
                        'required' => '{field} harus diisi.',
                    ]
                ];
            }
        }
        return $config;
    }
    // ---------------------------------------------------------------------------------
    // End Setting Apps

    // Home
    // ---------------------------------------------------------------------------------
    public function indexHome()
    {
        $home = new \App\Models\HomeModel();
        $home = $home->findAll();
        $data = [
            'title' => 'Home',
            'page' => 'home',
            'home' => $home,
        ];
        // dd($data);
        return view('home/index', $data);
    }
    public function addHome()
    {
        $data = [
            'title' => 'Tambah Beranda',
            'page' => 'home',
            'validation' => \Config\Services::validation()
        ];
        return view('home/add', $data);
    }
    public function saveHome()
    {
        $validation = \Config\Services::validation();
        $pesan = [];
        if ($this->validate($this->rulesValidationHome())) {
            if ($this->request->getPost('image_home') == "undefined") {
                $pesan['image_home'] = "Gambar beranda harus diisi";
                $pesan['title_home'] = '';
                $pesan['description_home'] = '';
                echo json_encode(array('status' => 400, 'pesan' => $pesan));
                return;
            }
            $imageHome = $this->request->getPost('image_home');
            $imageHome = str_replace('data:image/png;base64,', '', $imageHome);
            $imageHome = str_replace(' ', '+', $imageHome);
            $dataImage = base64_decode($imageHome);
            $imageName = 'home_' . time() . '.png';
            $pathName = 'uploads/home/' . $imageName;
            file_put_contents($pathName, $dataImage);
            $data = [
                'title_home' => $this->request->getPost('title_home'),
                'description_home' => $this->request->getPost('description_home'),
                'image_home' => $imageName,
                'active_home' => 0,
            ];
            // dd($data);
            $homeModel = new \App\Models\HomeModel();
            $query = $homeModel->save($data);
            if ($query) {
                session()->setFlashdata('message_success', 'Data Beranda Berhasil Disimpan');
                echo json_encode(array('status' => 200, 'pesan' => 'Berhasil disimpan !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal disimpan !!'));
            }
        } else {
            if ($this->request->getPost('image_home') == "undefined") {
                $pesan['image_home'] = "Gambar beranda harus diisi";
            }
            $pesan['title_home'] = $validation->getError('title_home');
            $pesan['description_home'] = $validation->getError('description_home');
            echo json_encode(array('status' => 400, 'pesan' => $pesan));
        }
    }
    public function deleteHome()
    {
        $id_home = $this->request->getVar('id');
        $homeModel = new \App\Models\HomeModel();
        $home = $homeModel->find($id_home);
        if (empty($home)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Beranda tidak ditemukan.');
        }
        $query = $homeModel->delete($id_home);
        if ($query) {
            session()->setFlashdata('message_success', 'Data Beranda Berhasil Dihapus');
            echo json_encode(array('status' => 200, 'pesan' => 'Berhasil dihapus !!'));
        } else {
            echo json_encode(array('status' => 0, 'pesan' => 'Gagal dihapus !!'));
        }
    }
    public function editHome($id_home)
    {
        $homeModel = new \App\Models\HomeModel();
        $home = $homeModel->find($id_home);
        if (empty($home)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Beranda tidak ditemukan.');
        }
        $data = [
            'title' => 'Edit Beranda',
            'page' => 'home',
            'home' => $home,
            'validation' => \Config\Services::validation()
        ];
        return view('home/edit', $data);
    }
    public function updateHome()
    {
        $validation = \Config\Services::validation();
        $pesan = [];
        if ($this->validate($this->rulesValidationHome())) {
            $data = [
                'id_home' => $this->request->getPost('id_home'),
                'title_home' => $this->request->getPost('title_home'),
                'description_home' => $this->request->getPost('description_home'),
                'active_home' => 0,
            ];
            if ($this->request->getPost('image_home') != "undefined") {
                $imageHome = $this->request->getPost('image_home');
                $imageHome = str_replace('data:image/png;base64,', '', $imageHome);
                $imageHome = str_replace(' ', '+', $imageHome);
                $dataImage = base64_decode($imageHome);
                $imageName = 'home_' . time() . '.png';
                $pathName = 'uploads/home/' . $imageName;
                file_put_contents($pathName, $dataImage);
                if (file_exists('uploads/home/' . $this->request->getPost('image_home_old'))) {
                    unlink('uploads/home/' . $this->request->getPost('image_home_old'));
                }
                $data['image_home'] = $imageName;
            }

            $homeModel = new \App\Models\HomeModel();
            $query = $homeModel->save($data);
            if ($query) {
                session()->setFlashdata('message_success', 'Data Beranda Berhasil Diubah');
                echo json_encode(array('status' => 200, 'pesan' => 'Berhasil diubah !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal diubah !!'));
            }
        } else {
            $pesan['title_home'] = $validation->getError('title_home');
            $pesan['description_home'] = $validation->getError('description_home');
            echo json_encode(array('status' => 400, 'pesan' => $pesan));
        }
    }
    private function rulesValidationHome()
    {
        $config = [
            'title_home' => [
                'label' => 'Judul beranda',
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ],
            ],
            'description_home' => [
                'label' => 'Deskripsi beranda',
                'rules' => 'required|max_length[200]',
                'errors' => [
                    'required' => '{field} harus diisi.',
                    'max_length' => '{field} maksimal berisi {param} karakter.',
                ],
            ]
        ];

        return $config;
    }
    // ---------------------------------------------------------------------------------
    // End Home

    // About
    // ---------------------------------------------------------------------------------
    public function indexAbout()
    {
        $aboutModel = new \App\Models\AboutModel();
        $about = $aboutModel->findAll()[0];
        if (empty($about)) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('Tentang tidak ditemukan.');
        }
        $data = [
            'title' => 'Edit Tentang',
            'page' => 'about',
            'about' => $about,
            'validation' => \Config\Services::validation()
        ];
        return view('about/index', $data);
    }
    public function updateAbout()
    {
        $validation = \Config\Services::validation();
        $pesan = [];
        if ($this->validate($this->rulesValidationAbout())) {
            $data = [
                'id_about' => $this->request->getPost('id_about'),
                'description_about' => $this->request->getPost('description_about'),
                'visi_about' => $this->request->getPost('visi_about'),
                'misi_about' => $this->request->getPost('misi_about'),
            ];
            if ($this->request->getPost('image_about') != "undefined") {
                $imageAbout = $this->request->getPost('image_about');
                $imageAbout = str_replace('data:image/png;base64,', '', $imageAbout);
                $imageAbout = str_replace(' ', '+', $imageAbout);
                $dataImage = base64_decode($imageAbout);
                $imageName = 'home_' . time() . '.png';
                $pathName = 'uploads/about/' . $imageName;
                file_put_contents($pathName, $dataImage);
                if (file_exists('uploads/about/' . $this->request->getPost('image_about_old'))) {
                    unlink('uploads/about/' . $this->request->getPost('image_about_old'));
                }
                $data['image_about'] = $imageName;
            }

            $aboutModel = new \App\Models\AboutModel();
            $query = $aboutModel->save($data);
            if ($query) {
                session()->setFlashdata('message_success', 'Data Tentang Berhasil Diubah');
                echo json_encode(array('status' => 200, 'pesan' => 'Berhasil diubah !!'));
            } else {
                echo json_encode(array('status' => 0, 'pesan' => 'Gagal diubah !!'));
            }
        } else {
            $pesan['description_about'] = $validation->getError('description_about');
            $pesan['visi_about'] = $validation->getError('visi_about');
            $pesan['misi_about'] = $validation->getError('misi_about');
            echo json_encode(array('status' => 400, 'pesan' => $pesan));
        }
    }
    private function rulesValidationAbout()
    {
        $config = [
            'description_about' => [
                'label' => 'Info Singkat',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'visi_about' => [
                'label' => 'Visi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ],
            'misi_about' => [
                'label' => 'Misi',
                'rules' => 'required',
                'errors' => [
                    'required' => '{field} harus diisi.',
                ],
            ]
        ];

        return $config;
    }
    // ---------------------------------------------------------------------------------
    // End About

    // Contact
    // ---------------------------------------------------------------------------------
    public function indexContact()
    {
        $contactsModel = new \App\Models\ContactsModel();
        $data = [
            'title' => 'Pesan Masuk',
            'page' => 'contact',
            'contact' => $contactsModel->getAllContact()
        ];
        return view('contact/index', $data);
    }

    function getOneContact()
    {
        $contactsModel = new \App\Models\ContactsModel();
        $data = $contactsModel->find($this->request->getPost('id'));
        if ($data) {
            echo json_encode(array('status' => 200, 'pesan' => 'Berhasil ambil data !!', 'data' => $data));
        } else {
            echo json_encode(array('status' => 400, 'pesan' => 'Gagal ambil data !!'));
        }
    }
    public function emailContact()
    {
        $contactsModel = new \App\Models\ContactsModel();
        $id = $this->request->getPost('id');
        $subject_email = $this->request->getPost('subject_email');
        $balas = $this->request->getPost('balas');
        if ($id == '' || $subject_email == '' || $balas == '') {
            session()->setFlashdata('message_error', 'Silahkan cek inputan anda');
            return redirect()->back();
        }
        $data = [
            'id' => $id,
            'subject_email' => $subject_email,
            'balas' => $balas,
        ];
        $contactsModel->save($data);

        $contact = $contactsModel->find($id);
        $email = service('email');
        $config = new Email();
        $dataview = [
            'subject' => $subject_email,
            'message' => $balas,
        ];
        $sent = $email->setFrom($config->fromEmail, $config->fromName)
            ->setTo($contact['email'])
            ->setSubject($subject_email)
            ->setMessage(view('auth/emails/email_contact', $dataview))
            ->setMailType('html')
            ->send();

        if (!$sent) {
            session()->setFlashdata('message_error', 'Gagal mengirim balasan email ke ' . $contact['email']);
        } else {
            $datastatus = [
                'id' => $id,
                'status' => 1,
            ];
            $contactsModel->save($datastatus);
            session()->setFlashdata('message_success', 'Berhasil mengirim balasan email ke ' . $contact['email']);
        }
        return redirect()->back();
    }
    // ---------------------------------------------------------------------------------
    // End Contact


    public function setSess()
    {
        if ($this->request->getPost('sessName') != null && $this->request->getPost('sessValue') != null) {
            if ($this->request->getPost('sessValue') == '') {
                session()->remove($this->request->getPost('sessName'));
            } else {
                session()->remove($this->request->getPost('sessName'));
                session()->set($this->request->getPost('sessName'), $this->request->getPost('sessValue'));
            }
        } else {
            session()->remove($this->request->getPost('sessName'));
        }
        echo json_encode(session()->get($this->request->getPost('sessName')));
    }
}
