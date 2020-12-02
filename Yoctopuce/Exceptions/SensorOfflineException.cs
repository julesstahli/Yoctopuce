// File: Yoctopuce\Exceptions\SensorOfflineException.cs
// Date: 2020-12-02
// Authors: STAHLI Jules,
// Version: 1.0

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace Yoctopuce.Exceptions
{
    public class SensorOfflineException : Exception
    {
        // Constants

        private const string DEFAULT_ERROR_MESSAGE = "Sensor is offline";

        // Constructors
        public SensorOfflineException(string name = DEFAULT_ERROR_MESSAGE) : base(name)
        {
            // Do nothing
        }
    }
}
