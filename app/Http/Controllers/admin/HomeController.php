<?php
namespace App\Http\Controllers\Admin;

use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Models\OrderList;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class HomeController extends Controller
{
    public function index()
    {
        $user = Auth::guard('admin')->user();
    
        $newOrders=$this->neworder();
        $paichatdata=$this->orderPieChartData();
         $totalsells=$this->totalsell();
        
        return view('admin.dashboard', compact('newOrders', 'paichatdata', 'totalsells'));
    }
    


public function logout(Request $request)
{
    auth('admin')->logout();
    $request->session()->invalidate();
    $request->session()->regenerateToken();

    return redirect()->route('admin.login');
}

protected function neworder(){

   $endOfLastMonth = Carbon::now()->startOfMonth(); 
    $totalOrdersCount = OrderList::count();
    $oldOrdersCount = OrderList::where('order_date', '<', $endOfLastMonth)->count();
   $newOrdersCount = OrderList::where('order_date', '>=', Carbon::now()->startOfMonth())->count();
  
  if ($oldOrdersCount == 0) {
      return [
        'percentageChange' => 0,
        'newOrdersCount' => 0,
        'isDecrease' => false,
        'totalOrdersCount' => $totalOrdersCount
      ];
  }
  
  $percentageChange = (($newOrdersCount - $oldOrdersCount) / $oldOrdersCount) * 100;
  $isDecrease = $percentageChange < 0;
  
  return [
      'percentageChange' => $percentageChange,
      'newOrdersCount' => $newOrdersCount,
      'isDecrease' => $isDecrease,
      'totalOrdersCount' => $totalOrdersCount
  ];

}

protected function newuser(){
    $endOfLastMonth = Carbon::now()->startOfMonth();
     $oldUsersCount = User::where('created_at', '<', $endOfLastMonth)->count();
    $newUsersCount = User::where('created_at', '>=', Carbon::now()->startOfMonth())->count();
    if ($oldUsersCount == 0) {
       return [
           'percentageChange' => 0,
           'newUsersCount' => 0,
           'isDecrease' => false
       ];
    }
    $percentageChange = (((int)$newUsersCount - (int)$oldUsersCount) / (int)$oldUsersCount) * 100;
    $isDecrease = $percentageChange < 0;
    return [
        'percentageChange' => $percentageChange,
        'newUsersCount' => $newUsersCount,
        'isDecrease' => $isDecrease
    ];
}
protected function totalsell(){
    $totalOrdercount = OrderList::count();

    $totalOrders = OrderList::where('status', 'Delivered')->count();
    $endOfLastMonth = Carbon::now()->startOfMonth();
    $oldsellCount = OrderList::where('created_at', '<', $endOfLastMonth)->where('status', 'delivered')->count();
   $newsellCount = OrderList::where('created_at', '>=', Carbon::now()->startOfMonth())->where('status', 'delivered')->count();
   if ($oldsellCount == 0) {
      return [
          'percentageChange' => 0,
          'newSellsCount' => 0,
          'isDecrease' => false,
          'totalOrders' => $totalOrders,
          'totalOrdersCount' => $totalOrdercount

      ];
   }
   $percentageChange = (((int)$newsellCount - (int)$oldsellCount) / (int)$oldsellCount) * 100;
   $isDecrease = $percentageChange < 0;
   return [
       'percentageChange' => $percentageChange,
       'newUsersCount' => $newsellCount,
       'isDecrease' => $isDecrease,
       'totalOrders' => $totalOrders
   ];
}

protected function orderPieChartData() {
    
    $orderStatuses = ['Placed', 'Accepted', 'Shipped', 'Delivered', 'Cancelled', 'Returned', 'Out for Delivery'];
    $orderData = [];

    foreach ($orderStatuses as $status) {
        $orderData[$status] = OrderList::where('status', strtolower($status))->count();
    }

    return $orderData;
}



}
