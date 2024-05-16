<?php namespace App\Controllers;

use CodeIgniter\Controller;
use App\Models\UserModel;
use App\Models\AdminModel;
use App\Models\RestaurantTableModel;
use App\Models\MenuItemModel;
use App\Models\TableModel;
use Endroid\QrCode\QrCode;
use Endroid\QrCode\ErrorCorrectionLevel;
use Endroid\QrCode\Writer\PngWriter;



class MenuController extends BaseController
{
    protected $session;
    protected $userModel;

    public function __construct()
    {
        helper('url'); 
        $this->session = session();
        $this->userModel = new UserModel(); 
    }

    public function index()
    {
        // if (!$this->session->has('user_email')) {
        //     return redirect()->to('/login'); // Redirect to login page if user is not logged in
        // }
    
        // $userEmail = $this->session->get('user_email');
        // $userInfo = $this->userModel->getUserByEmail($userEmail); // Fetch user information by email
    
        // // Here we use the 'restaurant_name' instead of 'name'
     
    
        // $menuItemModel = new MenuItemModel();
        // $userId = $this->session->get('user_id');
        // $data['menuItems'] = $menuItemModel->where('user_id', $userId)->findAll();
    
        return view('menu', $data); // Pass data to the view
    }
    


    public function addmenuitem()
    {
        $model = new MenuItemModel(); // Make sure to include the namespace if needed
        $userId = session()->get('user_id');
        // Check if the request is POST to handle form submission
        if ($this->request->getMethod() === 'POST') {
            $data = [
                'name'        => $this->request->getPost('name'),
                'description' => $this->request->getPost('description'),
                'price'       => $this->request->getPost('price'),
                'user_id'     => $userId  // Make sure this is not null and correctly linked to your user table
            ];

            if ($model->insert($data)) {
                return redirect()->to('/menu')->with('success', 'Menu item added successfully.');
            } else {
                // If the insert fails, retrieve error messages from the model
                $errors = $model->errors();
                return redirect()->back()->with('error', implode(' ', $errors));
            }
    }
            return view('addmenuitem');
    }

    // Admin Page - add user 

//     public function addUserForm()
// {
//     return view('userform');
// }

    public function add()
    {
        $model = new \App\Models\UserModel(); // Ensure correct namespace is used
        
        if ($this->request->getMethod() === 'POST') {
            $inputData = [
                'restaurant_name' => $this->request->getPost('restaurant_name'),
                'contact_name' => $this->request->getPost('contact_name'),
                'contact_address' => $this->request->getPost('contact_address'),
                'contact_number' => $this->request->getPost('contact_number'),
                'email' => $this->request->getPost('email'),
                'password' => password_hash($this->request->getPost('password'), PASSWORD_DEFAULT), 
            ];
            
            if ($model->insert($inputData)) {
                return redirect()->to('/admin')->with('success', 'Restaurant added successfully.');
            } else {
                $errors = $model->errors();
                log_message('error', 'Insertion failed. Errors: ' . implode(' ', $errors));
                return redirect()->back()->with('error', implode(' ', $errors));
            }
        }
        
        $data['users'] = $model->findAll();
        return view('admin', $data);
    }

    public function addUserForm() {
        return view('userform');

    }



    

    public function edit($id)
{
    $model = new \App\Models\UserModel(); // Ensure correct namespace is used
    $user = $model->find($id);

    if ($this->request->getMethod() === 'POST') {
        $inputData = [
            'restaurant_name' => $this->request->getPost('restaurant_name'),
            'contact_name' => $this->request->getPost('contact_name'),
            'contact_address' => $this->request->getPost('contact_address'),
            'contact_number' => $this->request->getPost('contact_number'),
            'email' => $this->request->getPost('email'),
        ];

        if ($model->update($id, $inputData)) {
            return redirect()->to('/admin')->with('success', 'Restaurant updated successfully.');
        } else {
            $errors = $model->errors();
            return redirect()->back()->with('error', implode(' ', $errors));
        }
    }

    $data['editUser'] = $user;
    $data['users'] = $model->findAll();
    return view('admin', $data);
}



    public function login()
    {
        return view('login');
    }

 

    public function landingpage()
    {
        return view('landingpage');
    }

    public function admin()
    {
        // Create an instance of your RestaurantTableModel
        $model = new UserModel();
        
        // Get the search query from the request (via GET method)
        $search = $this->request->getPost('search');
        
        if (!empty($search)) {
            // If the search query is not empty
            
            // Initialize an empty array to store search conditions
            $conditions = [];
            
            // Replace `allowedFields` with the actual column names you want to search across
            $searchFields = ['id', 'name', 'email', 'password', 'is_admin' , 'contact_name', 'contact_number', 'contact_address', 'restaurant_name']; // Example field names
    
            // Create LIKE conditions for each field
            foreach ($searchFields as $field) {
                $conditions[] = "$field LIKE '%$search%'";
            }
    
            // Create a where clause with OR conditions
            $whereClause = implode(' OR ', $conditions);
    
            // Fetch all restaurant records that match the search criteria
            $users = $model->where($whereClause)->findAll();
        } else {
            // If no search query is provided, fetch all restaurant records
            $users = $model->findAll();
        }
    
        // Store the retrieved restaurants in the $data array
        $data['users'] = $users;
        
        // Pass the search query value to the view for reuse in the form input field
        $data['search'] = $search;
    
        // Load the 'admin' view and pass the $data array to it
        return view('admin', $data);
    }
    
    

    public function admincont()
    {
        return view('admincont');
    }


    
 
    

    

    public function loginAdmin()
    {
    $adminModel = new AdminModel();

    // Get the email and password from the form
    $email = $this->request->getPost('username');
    $password = $this->request->getPost('password');

    // Check if the email exists in the database
    $admin = $adminModel->where('username', $email)->first();

    if ($admin) {
        // Verify the password
        if (password_verify($password, $admin['password'])) {
            // Authentication successful
            // Set the admin session data
            session()->set('admin_id', $admin['admin_id']);
            session()->set('admin_email', $admin['username']);

            // Redirect to the restaurants page
            return redirect()->to('/admin');
        }
    }

    return redirect()->to('/admincont')->with('error', 'Invalid email or password');
}
    
    


    public function loginUser()
    {
        // Load the UserModel
        $userModel = new UserModel();
        
        // Get form input data
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');
        
        // Query the database to get user data by email
        $userData = $userModel->getUserByEmail($email);
    
        // Debugging: Check if $userData is retrieved
        echo "<pre>User Data: ";
        print_r($userData);
        echo "</pre>";
        
        // Check if a user with the provided email exists and if the password matches
        if ($userData && isset($userData['password']) && password_verify($password, $userData['password'])) {
                session()->set('user_id', $userData['id']);
                session()->set('restaurant_name', $userData['restaurant_name']);    
                return redirect()->to('/menu');
            // }
        } else {
            // Debugging: If invalid credentials
            echo "Invalid credentials!";
            
            // Invalid credentials, redirect back to login page with error message
            return redirect()->to('/login')->withInput()->with('error', 'Invalid email or password');
        }
    }
    public function register(){
        return view('register');
 
    }

    // app/Controllers/MenuController.php

    public function delete($id)
    {
        // Instantiate the RestaurantTableModel
        $model = new UserModel();

        // Attempt to delete the restaurant entry by ID
        if ($model->delete($id)) {
            // Log a success message and set a success flash message
            $this->session->setFlashdata('success', 'Restaurant deleted successfully.');
        } else {
            // Log an error message and set an error flash message
            $this->session->setFlashdata('error', 'Failed to delete restaurant. Please try again.');
        }

        // Redirect to the admin page (or wherever appropriate)
        return redirect()->to('/admin');
    }


    // Menu Page Functionalities 

    public function menu()
    {
        $model = new \App\Models\MenuItemModel(); // Use MenuItemModel to fetch menu items
        $menuItems = $model->findAll();  // Fetch all menu items from the database
        // $menuItems = $model->where('user_id', session()->get('user_id'))->findAll();
        // Pass menuItems to the view
        return view('menu', ['menuItems' => $menuItems]);
    }


    // public function addCategory($id = null)
    // {
    // $model = new MenuCategoryModel();

    // // Check if the request is a POST request (form submission).
    // if ($this->request->getMethod() === 'POST') {
    //     // Retrieve the submitted form data.
    //     $data = $this->request->getPost();

    //     // If no ID is provided, it's an add operation.
    //     if ($id === null) {
    //         if ($model->insert($data)) {
    //             // If the user is successfully added, set a success message.
    //             $this->session->setFlashdata('success', 'User added successfully.');
    //         } else {
    //             // If the addition fails, set an error message.
    //             $this->session->setFlashdata('error', 'Failed to add user. Please try again.');
    //         }
    //     } else {
    //         // If an ID is provided, it's an edit operation.
    //         if ($model->update($id, $data)) {
    //             // If the user is successfully updated, set a success message.
    //             $this->session->setFlashdata('success', 'User updated successfully.');
    //         } else {
    //             // If the update fails, set an error message.
    //             $this->session->setFlashdata('error', 'Failed to update user. Please try again.');
    //         }
    //     }

    //     // Redirect back to the admin page after the operation.
    //     $data['name'] = 'Your Name'; // Replace with dynamic data as needed
    //     return redirect()->to('/menu');
    // }

    // // If the request is a GET request, load the form with existing user data (for edit) or as blank (for add).
    // $data['menucategory'] = ($id === null) ? null : $model->find($id);

    // // Display the add/edit form view, passing in the user data if available.
    // return view('addcategory', $data);
    // }



    public function registerUser()
    {
    // Load the UserModel
    $userModel = new UserModel();

    // Get form input data
    $name = $this->request->getPost('name');
    $email = $this->request->getPost('email');
    $password = $this->request->getPost('password');
    $restaurantName = $this->request->getPost('restaurant_name');
    $contactName = $this->request->getPost('contact_name');
    $contactPhone = $this->request->getPost('contact_number');
    $address = $this->request->getPost('contact_address');



    // Validate form data
    $validationRules = [
        'name' => 'required',
        'email' => 'required|valid_email|is_unique[users.email]',
        'password' => 'required', 
        'restaurant_name' => 'required',
        'contact_name' => 'required',
        'contact_number' => 'required',
        'contact_address' => 'required',

    ];

    if (!$this->validate($validationRules)) {
        // If validation fails, return to the registration form with errors
        return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
    }

   // Insert user data into the database
    $userData = [
    'name' => $name,
    'email' => $email,
    'password' => password_hash($password, PASSWORD_DEFAULT), // Hash the password before storing it
    'is_admin' => false, // Assuming this is the default value for new users
    'restaurant_name' => $restaurantName,
    'contact_name' => $contactName,
    'contact_number' => $contactPhone,
    'contact_address' => $address,

    ];
    $userId = $userModel->insert($userData);
        return redirect()->to('/login')->with('success', 'Registration successful. Please login.');
    }

    public function editmenuitem($id = null)
    {
        $model = new MenuItemModel();
        $data = []; // Initialize the $data variable


        if ($this->request->getMethod() === 'POST') {
            $data = $this->request->getPost();
            $item_id = $data['item_id']; // Assuming 'item_id' is a hidden field in the form

            if ($model->update($item_id, $data)) {
                $this->session->setFlashdata('success', 'Menu item updated successfully.');
            } else {
                $this->session->setFlashdata('error', 'Failed to update menu item. Please try again.');
            }

            return redirect()->to('/menu');
        }

        if ($id) {
            $user = $model->find($id);
            if ($user) {
                $data['user'] = $user;
            } 
        }

        return view('editmenuitem', $data);
    }

    public function deletemenuitem($item_id=null)
    {
        $model = new MenuItemModel();
        if ($item_id && $model->deleteItemById($item_id)) {
            // Set success message
            session()->setFlashdata('success', 'Menu item deleted successfully.');
        } else {
            // Set error message
            session()->setFlashdata('error', 'Failed to delete menu item. Please try again.');
        }
    
        return redirect()->to('/menu'); // Redirect to menu listing page
    }
    
    public function QRgenerate($tableId)
    {
        $tableModel = new TableModel();
        $table = $tableModel->find($tableId);
        
        if ($table) {
            $userId = $table['user_id'];
            $qrCodeData = base_url('addtocart/' . $userId . '/' . $table['table_no']);
            $qrCode = QrCode::create($qrCodeData);
            $qrCodeFilename = 'qrcode_table_' . $table['table_no'] . '.png';
            $qrCodePath = FCPATH . 'qrcodes/' . $qrCodeFilename;
            
            // Create the "qrcodes" directory in the public folder if it doesn't exist
            $qrCodeDirectory = FCPATH . 'qrcodes/';
            if (!is_dir($qrCodeDirectory)) {
                mkdir($qrCodeDirectory, 0777, true);
            }
            
            try {
                // Save the QR code image to the file in the public folder
                (new PngWriter())->write($qrCode)->saveToFile($qrCodePath);
                
                // Update the table record with the QR code filename
                $tableModel->update($tableId, ['table_QR' => $qrCodeFilename]);
                
                return redirect()->to('/tables')->with('success', 'QR code generated successfully.');
            } catch (\Exception $e) {
                log_message('error', 'Error generating QR code: ' . $e->getMessage());
                return redirect()->to('/tables')->with('error', 'Failed to generate QR code.');
            }
        } else {
            return redirect()->to('/tables')->with('error', 'Table not found.');
        }
    }

    public function addToCart()
{
    // Retrieve the user and table details based on the provided user ID and table number
 return view('addtocart');
}
    
    public function tables()
    {
        $userId = session()->GET('user_id');
        $tableModel = new \App\Models\TableModel();
        $tables = $tableModel->select('id, table_no, table_QR')->where('user_id', $userId)->findAll();
        $data = ['tables' => $tables];
        return view('tables', $data);
    }
    
    public function QRdownload($fileName)
    {
        $filePath = FCPATH . "qrcodes/{$fileName}";
        if (file_exists($filePath)) {
            return $this->response->setFileName($fileName)->download($filePath, null);
        } else {
            return redirect()->to('/tables')->with('error', 'QR code file not found.');
        }
    }
    public function addTable()
{
    // Get the logged-in user's ID from the session
    $userId = session()->GET('user_id');

    // Load the TableModel
    $tableModel = new \App\Models\TableModel();

    // Get the highest table number for the logged-in user
    $maxTableNum = $tableModel->where('user_id', $userId)->selectMax('table_no')->first();
    $newTableNum = $maxTableNum['table_no'] + 1;

    // Insert a new table record
    $tableModel->insert([
        'user_id' => $userId,
        'table_no' => $newTableNum
    ]);

    return redirect()->to('/tables')->with('success', 'Table added successfully.');
}

// Add to cart page functions 






}


