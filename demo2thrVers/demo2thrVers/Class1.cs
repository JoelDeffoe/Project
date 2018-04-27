using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows;

namespace demo2thrVers
{
    public partial class MainWindow : Window
    {
        public MainWindow()
        {
            InitializeComponent();
        }

        private void btnCalculateSalary_Click(object sender, RoutedEventArgs e)
        {
            calculate();
        }

        private void calculate()
        {
            int hours = Int32.Parse(txtHours.Text);
            double wage = Double.Parse(txtWage.Text);
            SalaryCalculator salaryCalculator = new SalaryCalculator(hours, wage);

            double salary = salaryCalculator.calculateSalary();

            txtSalary.Text = salary.ToString("C");
            // More ToString format types at https://docs.microsoft.com/en-us/dotnet/standard/base-types/standard-numeric-format-strings
        }
    }
}