<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CalculatorController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MortgagePaymentController;
use App\Http\Controllers\RefinanceSavingsController;
use App\Http\Controllers\AutoLoanController;
use App\Http\Controllers\PersonalLoanAprController;
use App\Http\Controllers\CreditPayoffController;
use App\Http\Controllers\CompoundGrowthController;
use App\Http\Controllers\RetirementGapController;
use App\Http\Controllers\SalaryHourlyController;
use App\Http\Controllers\TaxEstimatorController;
use App\Http\Controllers\AutoInsurancePremiumController;
use App\Http\Controllers\LifeInsuranceNeedsController;
use App\Http\Controllers\HsaVsPpoController;
use App\Http\Controllers\StudentRefiController;
use App\Http\Controllers\HomeAffordabilityController;
use App\Http\Controllers\RentVsBuyController;
use App\Http\Controllers\CurrencyConverterController;
use App\Http\Controllers\NetWorthController;
use App\Http\Controllers\SolarRoiController;
use App\Http\Controllers\DtiRatioController;
use App\Http\Controllers\IraRothController;

Route::view('calculator','layouts.body');
Route::get('/ira-roth', [IraRothController::class, 'showForm'])->name('ira.form');
Route::post('/ira-roth', [IraRothController::class, 'calculate'])->name('ira.calculate');
Route::get('/dti-ratio', [DtiRatioController::class, 'showForm'])->name('dti.form');
Route::post('/dti-ratio', [DtiRatioController::class, 'calculate'])->name('dti.calculate');
Route::get('/solar-roi', [SolarRoiController::class, 'showForm'])->name('solar.form');
Route::post('/solar-roi', [SolarRoiController::class, 'calculate'])->name('solar.calculate');
Route::get('/net-worth', [NetWorthController::class, 'showForm'])->name('networth.form');
Route::post('/net-worth', [NetWorthController::class, 'calculate'])->name('networth.calculate');
Route::get('/currency-converter', [CurrencyConverterController::class, 'showForm'])->name('currency.form');
Route::post('/currency-converter', [CurrencyConverterController::class, 'convert'])->name('currency.convert');
Route::get('/rent-vs-buy', [RentVsBuyController::class, 'showForm'])->name('rentvsbuy.form');
Route::post('/rent-vs-buy', [RentVsBuyController::class, 'calculate'])->name('rentvsbuy.calculate');
Route::get('/home-affordability', [HomeAffordabilityController::class, 'showForm'])->name('home.affordability.form');
Route::post('/home-affordability', [HomeAffordabilityController::class, 'calculate'])->name('home.affordability.calculate');
Route::get('/student-refi', [StudentRefiController::class, 'showForm'])->name('student.refi.form');
Route::post('/student-refi', [StudentRefiController::class, 'calculate'])->name('student.refi.calculate');
Route::get('/hsa-vs-ppo', [HsaVsPpoController::class, 'showForm'])->name('hsa.form');
Route::post('/hsa-vs-ppo', [HsaVsPpoController::class, 'calculate'])->name('hsa.calculate');
Route::get('/life-insurance-needs', [LifeInsuranceNeedsController::class, 'showForm'])->name('life.form');
Route::post('/life-insurance-needs', [LifeInsuranceNeedsController::class, 'calculate'])->name('life.calculate');
Route::get('/auto-insurance-premium', [AutoInsurancePremiumController::class, 'showForm'])->name('auto.form');
Route::post('/auto-insurance-premium', [AutoInsurancePremiumController::class, 'estimate'])->name('auto.estimate');
Route::get('/tax-estimator', [TaxEstimatorController::class, 'showForm'])->name('tax.form');
Route::post('/tax-estimator', [TaxEstimatorController::class, 'estimate'])->name('tax.estimate');
Route::get('/salary-hourly', [SalaryHourlyController::class, 'showForm'])->name('salary.form');
Route::post('/salary-hourly', [SalaryHourlyController::class, 'calculate'])->name('salary.calculate');
Route::get('/retirement-gap', [RetirementGapController::class, 'showForm'])->name('retirement.form');
Route::post('/retirement-gap', [RetirementGapController::class, 'calculate'])->name('retirement.calculate');
Route::get('/compound-growth', [CompoundGrowthController::class, 'index'])->name('compound-growth.form');
Route::post('/compound-growth/calculate', [CompoundGrowthController::class, 'calculate'])->name('compound-growth.calculate');
Route::get('/credit-payoff', [CreditPayoffController::class, 'index'])->name('credit-payoff.form');
Route::post('/credit-payoff/calculate', [CreditPayoffController::class, 'calculate'])->name('credit-payoff.calculate');
Route::get('/personal-loan-apr', [PersonalLoanAprController::class, 'index'])->name('personal-loan-apr.form');
Route::post('/personal-loan-apr/calculate', [PersonalLoanAprController::class, 'calculate'])->name('personal-loan-apr.calculate');
Route::get('/auto-loan', [AutoLoanController::class, 'index'])->name('auto-loan.form');
Route::post('/auto-loan/calculate', [AutoLoanController::class, 'calculate'])->name('auto-loan.calculate');
Route::get('/mortgage-payment', [MortgagePaymentController::class, 'index'])->name('mortgage-payment');
Route::post('/mortgage-payment/calculate', [MortgagePaymentController::class, 'calculate'])->name('mortgage-payment.calculate');
Route::get('/refinance-savings', [RefinanceSavingsController::class, 'index'])->name('refinance-savings');
Route::post('/refinance-savings', [RefinanceSavingsController::class, 'calculate'])->name('refinance-savings.calculate');
    // // 1. CurrencyConverter
    // Route::get('currency-converter', [CurrencyConverterController::class, 'index']);
    // Route::post('currency-converter/calculate', [CurrencyConverterController::class, 'calculate']);

    // // 2. NetWorth
    // Route::get('net-worth', [NetWorthController::class, 'index']);
    // Route::post('net-worth/calculate', [NetWorthController::class, 'calculate']);

    // // 3. SolarRoi
    // Route::get('solar-roi', [SolarRoiController::class, 'index']);
    // Route::post('solar-roi/calculate', [SolarRoiController::class, 'calculate']);

    // // 4. DtiRatio
    // Route::get('dti-ratio', [DtiRatioController::class, 'index']);
    // Route::post('dti-ratio/calculate', [DtiRatioController::class, 'calculate']);

    // // 5. IraRoth
    // Route::get('ira-roth', [IraRothController::class, 'index']);
    // Route::post('ira-roth/calculate', [IraRothController::class, 'calculate']);

    // // 6. LifeInsuranceNeeds
    // Route::get('life-insurance-needs', [LifeInsuranceNeedsController::class, 'index']);
    // Route::post('life-insurance-needs/calculate', [LifeInsuranceNeedsController::class, 'calculate']);

    // // 7. HsaVsPpo
    // Route::get('hsa-vs-ppo', [HsaVsPpoController::class, 'index']);
    // Route::post('hsa-vs-ppo/calculate', [HsaVsPpoController::class, 'calculate']);

    // // 8. StudentRefi
    // Route::get('student-refi', [StudentRefiController::class, 'index']);
    // Route::post('student-refi/calculate', [StudentRefiController::class, 'calculate']);

    // // 9. HomeAffordability
    // Route::get('home-affordability', [HomeAffordabilityController::class, 'index']);
    // Route::post('home-affordability/calculate', [HomeAffordabilityController::class, 'calculate']);

    // // 10. RentVsBuy
    // Route::get('rent-vs-buy', [RentVsBuyController::class, 'index']);
    // Route::post('rent-vs-buy/calculate', [RentVsBuyController::class, 'calculate']);

    // // 11. SavingsGoal
    // Route::get('savings-goal', [SavingsGoalController::class, 'index']);
    // Route::post('savings-goal/calculate', [SavingsGoalController::class, 'calculate']);

    // // 12. CreditCardPayment
    // Route::get('credit-card-payment', [CreditCardPaymentController::class, 'index']);
    // Route::post('credit-card-payment/calculate', [CreditCardPaymentController::class, 'calculate']);

    // // 13. Budgeting
    // Route::get('budgeting', [BudgetingController::class, 'index']);
    // Route::post('budgeting/calculate', [BudgetingController::class, 'calculate']);

    // // 14. LoanAmortization
    // Route::get('loan-amortization', [LoanAmortizationController::class, 'index']);
    // Route::post('loan-amortization/calculate', [LoanAmortizationController::class, 'calculate']);

    // // 15. InvestmentGrowth
    // Route::get('investment-growth', [InvestmentGrowthController::class, 'index']);
    // Route::post('investment-growth/calculate', [InvestmentGrowthController::class, 'calculate']);

    // // 16. InflationEffect
    // Route::get('inflation-effect', [InflationEffectController::class, 'index']);
    // Route::post('inflation-effect/calculate', [InflationEffectController::class, 'calculate']);

    // // 17. SimpleInterest
    // Route::get('simple-interest', [SimpleInterestController::class, 'index']);
    // Route::post('simple-interest/calculate', [SimpleInterestController::class, 'calculate']);

    // // 18. DailyCompoundInterest
    // Route::get('daily-compound-interest', [DailyCompoundInterestController::class, 'index']);
    // Route::post('daily-compound-interest/calculate', [DailyCompoundInterestController::class, 'calculate']);

    // // 19. NetWorth
    // Route::get('net-worth', [NetWorthController::class, 'index']);
    // Route::post('net-worth/calculate', [NetWorthController::class, 'calculate']);

    // // 20. DebtToIncomeRatio
    // Route::get('debt-to-income-ratio', [DebtToIncomeRatioController::class, 'index']);
    // Route::post('debt-to-income-ratio/calculate', [DebtToIncomeRatioController::class, 'calculate']);




