using System.Collections;
using System.Collections.Generic;
using UnityEngine;

public class CameraControler : MonoBehaviour {

    public PlayerControl thePlayer;

    private Vector3 lastePlayerPosition;
    private float ditanceToMouve;

	// Use this for initialization
	void Start () {
        thePlayer = FindObjectOfType<PlayerControl>();
	}
	
	// Update is called once per frame
	void Update () {

        ditanceToMouve = thePlayer.transform.position.x - lastePlayerPosition.x;

        transform.position = new Vector3(transform.position.x + ditanceToMouve, transform.position.y, transform.position.z);

        lastePlayerPosition = thePlayer.transform.position;
		
	}
}
