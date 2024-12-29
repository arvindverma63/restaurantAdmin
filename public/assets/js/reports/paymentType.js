  // Initialize Flatpickr Date Pickers with Default Dates
  const today = new Date();
  const oneWeekAgo = new Date();
  oneWeekAgo.setDate(today.getDate() - 7);

  flatpickr('#startDate', {
      dateFormat: 'Y-m-d', // Format: YYYY-MM-DD
      defaultDate: oneWeekAgo, // Set default date to 1 week ago
      allowInput: true,
  });

  flatpickr('#endDate', {
      dateFormat: 'Y-m-d', // Format: YYYY-MM-DD
      defaultDate: today, // Set default date to today
      allowInput: true,
  });


  async function fetchDataAndRenderChart() {
      const apiUrl = 'https://rest.dicui.org/api/getReportPaymentType';

      // Get selected dates
      const startDate = document.getElementById('startDate').value;
      const endDate = document.getElementById('endDate').value;

      // Ensure dates are provided
      if (!startDate || !endDate) {
          alert('Please select both start and end dates.');
          return;
      }

      // Example payload for the POST request
      const requestData = {
          startDate: startDate,
          endDate: endDate,
          restaurantId: restaurantId // Replace with dynamic restaurantId if needed
      };

      try {
          // Fetch data from the API
          const response = await fetch(apiUrl, {
              method: 'POST',
              headers: {
                  'Content-Type': 'application/json'
              },
              body: JSON.stringify(requestData)
          });

          const data = await response.json();
          if (data.status === 'success') {
              const chartData = data.data;

              // Extract labels and values for the chart
              const labels = chartData.map(item => item.payment_type);
              const totalCounts = chartData.map(item => item.total_count);
              const totalAmounts = chartData.map(item => item.total_amount);

              // Render the chart
              const ctx = document.getElementById('paymentTypeChart').getContext('2d');
              new Chart(ctx, {
                  type: 'bar',
                  data: {
                      labels: labels,
                      datasets: [
                          {
                              label: 'Total Transactions',
                              data: totalCounts,
                              backgroundColor: 'rgba(75, 192, 192, 0.2)',
                              borderColor: 'rgba(75, 192, 192, 1)',
                              borderWidth: 1
                          },
                          {
                              label: 'Total Amount (₹)',
                              data: totalAmounts,
                              backgroundColor: 'rgba(153, 102, 255, 0.2)',
                              borderColor: 'rgba(153, 102, 255, 1)',
                              borderWidth: 1
                          }
                      ]
                  },
                  options: {
                      responsive: true,
                      scales: {
                          y: {
                              beginAtZero: true
                          }
                      }
                  }
              });
          } else {
              console.error('Failed to fetch data:', data);
          }
      } catch (error) {
          console.error('Error fetching data:', error);
      }
  }
