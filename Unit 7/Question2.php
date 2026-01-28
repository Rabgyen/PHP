<?php

class BankAccount {
    // Private properties (Encapsulation)
    private $accountNumber;
    private $accountHolder;
    private $balance;
    private $pin;
    private $transactionHistory = [];

    // Constructor
    public function __construct($accountNumber, $accountHolder, $initialBalance, $pin) {
        $this->accountNumber = $accountNumber;
        $this->accountHolder = $accountHolder;
        $this->balance = $initialBalance;
        $this->pin = $pin;

        $this->transactionHistory[] = "Account created with balance: $initialBalance";
    }

    // Deposit method
    public function deposit($amount) {
        if ($amount <= 0) {
            return "Invalid deposit amount.";
        }

        $this->balance += $amount;
        $this->transactionHistory[] = "Deposited: $amount";

        return "Deposit successful.";
    }

    // Withdraw method (PIN protected)
    public function withdraw($amount, $pin) {
        if ($pin !== $this->pin) {
            return "Incorrect PIN.";
        }

        if ($amount <= 0) {
            return "Invalid withdrawal amount.";
        }

        if ($amount > $this->balance) {
            return "Insufficient balance.";
        }

        $this->balance -= $amount;
        $this->transactionHistory[] = "Withdrawn: $amount";

        return "Withdrawal successful.";
    }

    // Get balance (PIN protected)
    public function getBalance($pin) {
        if ($pin !== $this->pin) {
            return "Incorrect PIN.";
        }

        return "Current Balance: $this->balance";
    }

    // Change PIN
    public function changePin($oldPin, $newPin) {
        if ($oldPin !== $this->pin) {
            return "Old PIN is incorrect.";
        }

        $this->pin = $newPin;
        $this->transactionHistory[] = "PIN changed successfully.";

        return "PIN updated.";
    }

    // Transaction history
    public function getTransactionHistory() {
        return $this->transactionHistory;
    }
}

/* -------------------------------
   DEMO: Multiple Transactions
-------------------------------- */

$account = new BankAccount("ACC001", "Rabgyen Moktan", 5000, 1234);

echo $account->deposit(3000) . "<br>";
echo $account->withdraw(2000, 1234) . "<br>";
echo $account->withdraw(1000, 1111) . "<br>"; // Wrong PIN
echo $account->getBalance(1234) . "<br>";
echo $account->changePin(1234, 4321) . "<br>";
echo $account->getBalance(4321) . "<br><br>";

echo "<b>Transaction History:</b><br>";
foreach ($account->getTransactionHistory() as $transaction) {
    echo "- $transaction<br>";
}

?>
