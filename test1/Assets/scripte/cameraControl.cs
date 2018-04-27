using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class cameraControl : MonoBehaviour {
    public Transform target;
    public Vector3 offset;
    public bool useOffsetValues;
    public float rotateSpeed;
    public Transform pivot;
    public float maxVuEngle;
    public float minVuEngle;
    public bool invertY;

    // Use this for initialization
    void Start () {
        if (useOffsetValues)
        {
            offset = target.position - transform.position;
        }
        pivot.transform.position = target.transform.position;
        //pivot.transform.parent = target.transform;
        pivot.transform.parent = null;
        Cursor.lockState = CursorLockMode.Locked;
	}
	
	// Update is called once per frame
	void LateUpdate () {

        pivot.transform.position = target.transform.position;

        //get the x postion of the mouis  & rotate target 
        float horisontal = Input.GetAxis("Mouse X") * rotateSpeed;
        pivot.Rotate(0, horisontal, 0);

        float verticale = Input.GetAxis("Mouse Y") * rotateSpeed;
        //pivot.Rotate(verticale, 0, 0);
        if (invertY)
        {
            pivot.Rotate(verticale, 0, 0);
        }
        else
        {
            pivot.Rotate(-verticale, 0, 0);
        }
        //limte up &down
        if (pivot.rotation.eulerAngles.x > maxVuEngle && pivot.rotation.eulerAngles.x < 180f)
        {
            pivot.rotation = Quaternion.Euler(maxVuEngle, 0, 0);
        }
        if (pivot.rotation.eulerAngles.x > 180f && pivot.rotation.eulerAngles.x < 360f+minVuEngle)
        {
            pivot.rotation = Quaternion.Euler(360f+minVuEngle, 0, 0);
        }

        //mouve camera 
        float desireYAngle = pivot.eulerAngles.y;
        float desireXAngle = pivot.eulerAngles.x;
        
        Quaternion rotation= Quaternion.Euler(desireXAngle, desireYAngle, 0);
        transform.position = target.position - ( rotation * offset);

        if (transform.position.y < target.position.y)
        {
            transform.position = new Vector3(transform.position.x, target.position.y-.5f, transform.position.z);

        }
        //transform.position = target.position - offset;
        transform.LookAt(target);
	}
}
