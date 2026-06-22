<?php
namespace App\Controllers;
use App\Models\UserModel;

class AdminController extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    // Tampilkan daftar semua user
    public function index()
    {
        $data['users'] = $this->userModel->findAll();
        return view('admin/user_list', $data);
    }

    // Proses update status langganan dari form
    public function updateSubscription($id)
    {
        // Ambil data dari form (jenis paket dan tanggal kedaluwarsa)
        $plan = $this->request->getPost('subscription_plan');
        $expire = $this->request->getPost('expire_date');

        // Update ke database
        $this->userModel->update($id, [
            'subscription_plan' => $plan,
            'expire_date' => $expire
        ]);

        // Kembalikan ke halaman admin dengan pesan sukses
        return redirect()->to('/admin')->with('pesan', 'Status langganan berhasil diperbarui!');
    }
}