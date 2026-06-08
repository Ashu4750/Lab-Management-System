<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lab Management System</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center">
        <div class="bg-white p-8 rounded-lg shadow-lg max-w-md w-full">
            <div class="text-center mb-8">
                <h1 class="text-3xl font-bold text-blue-600">Laboratory Management System</h1>
                <p class="text-gray-600 mt-2">Sign in to access your account</p>
            </div>
            
            <?php if(isset($_GET['error'])): ?>
            <div class="bg-red-100 border-l-4 border-red-500 text-red-700 p-4 mb-4" role="alert">
                <?php 
                    $errorMsg = '';
                    switch($_GET['error']) {
                        case 'emptyfields':
                            $errorMsg = 'Please fill in all required fields.';
                            break;
                        case 'wrongpassword':
                            $errorMsg = 'Incorrect password. Please try again.';
                            break;
                        case 'nouser':
                            $errorMsg = 'Username not found. Please check your username.';
                            break;
                        case 'sqlerror':
                            $errorMsg = 'Database error. Please try again later.';
                            break;
                        case 'invalidrole':
                            $errorMsg = 'Invalid user role. Please contact administrator.';
                            break;
                        case 'lockedout':
                            $time = isset($_GET['time']) ? $_GET['time'] : '15:00';
                            $errorMsg = "Too many failed login attempts. Your account is temporarily locked. Please try again in {$time} minutes.";
                            break;
                        default:
                            $errorMsg = 'An error occurred. Please try again.';
                    }
                    echo "<p>{$errorMsg}</p>";
                ?>
            </div>
            <?php endif; ?>
            
            <?php if(isset($_GET['success'])): ?>
            <div class="bg-green-100 border-l-4 border-green-500 text-green-700 p-4 mb-4" role="alert">
                <?php 
                    $successMsg = '';
                    switch($_GET['success']) {
                        case 'logout':
                            $successMsg = 'You have been successfully logged out.';
                            break;
                        case 'passwordreset':
                            $successMsg = 'Your password has been reset. Please login with your new password.';
                            break;
                        default:
                            $successMsg = 'Operation completed successfully.';
                    }
                    echo "<p>{$successMsg}</p>";
                ?>
            </div>
            <?php endif; ?>
            
            <form action="includes/login.inc.php" method="post" class="space-y-6">
                <div>
                    <label for="username" class="block text-sm font-medium text-gray-700">Username</label>
                    <input type="text" id="username" name="username" required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <label for="password" class="block text-sm font-medium text-gray-700">Password</label>
                    <input type="password" id="password" name="password" required 
                        class="mt-1 block w-full px-3 py-2 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-blue-500 focus:border-blue-500">
                </div>
                
                <div>
                    <button type="submit" name="login-submit" 
                        class="w-full flex justify-center py-2 px-4 border border-transparent rounded-md shadow-sm text-sm font-medium text-white bg-blue-600 hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                        Sign In
                    </button>
                </div>
            </form>
            
            <div class="mt-6 text-center text-sm text-gray-600">
                <p>Forgot your password? Contact system administrator</p>
            </div>
        </div>
    </div>
    
    <footer class="absolute bottom-0 w-full py-4 text-center text-gray-600 bg-gray-100">
        <p>© <?php echo date('Y'); ?> Laboratory Management System. All rights reserved.</p>
    </footer>
</body>
</html> 