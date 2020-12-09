// File: Yoctopuce\Sensors\Humidity.cs
// Date: 2020-12-09
// Authors: MEISSNER Jeremy,
// Version: 1.0

using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using Yoctopuce.Exceptions;

namespace Yoctopuce.Sensors
{
    class Humidity : Sensor
    { 
        // Constructors

        public Humidity()
        {
            hardwaredetect = 0;
            sensor = GetSensor();
        }

        // Methods

        /// <summary>
        /// Get sensor
        /// </summary>
        /// <returns></returns>
        protected override YSensor GetSensor()
        {
            string errmsg = "";
            if (hardwaredetect == 0) YAPI.UpdateDeviceList(ref errmsg);
            hardwaredetect = (hardwaredetect + 1) % 20;
            YAPI.HandleEvents(ref errmsg);
            YHumidity sensor = YHumidity.FirstHumidity();
            if (sensor is null)
            {
                throw new SensorNotDetectedException();
            }
            else if (!sensor.isOnline())
            {
                throw new SensorOfflineException();
            }
            else
            {
                return sensor;
            }
        }

        /// <summary>
        /// Get sensor value as string
        /// </summary>
        /// <returns></returns>
        public override string ToString()
        {
            return IsOnline ? $"{Value} {Unit}" : "Sensor is offline";
        }
    }
}
