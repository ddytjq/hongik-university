public class IO{
	public int front; // 머리
	public int rear; // 꼬리
	private int ioarray[]; //각 프로세서별 io 배열
	private int ioburst[]; //초기 프로세서별 io burst
	public ReadyQueue rd; // 레디큐
	public int cburst[]; // cpubutst
	public int num; // 프로세서개수
	public int ioadd[]; // io time
	public int number;
	public int processnum[];

	public IO(int num, int[] cburst, int[] ioburst, ReadyQueue q, int[] processnum){
		this.front = 0;
		this.rear = 0;
		this.num = num;
		this.cburst = cburst;
		this.ioburst = ioburst;
		this.ioarray = new int[num];
		this.rd = q;
		this.ioadd = new int[num];
		this.processnum = processnum;
		for(int w = 0; w <num; w++){
			ioarray[w] = ioburst[w];
			rear++;
			if(rear >= this.num)
				rear--;
		}
	}

	public void IOing(int i){
		if(ioarray[i] > 0){
			for(int a = front; a <= rear; a++){
				ioadd[a] ++;
				ioarray[a]--;
				if(ioarray[a] == 0){
					for(int q = processnum[a]; q <rear; q++){
						ioarray[q] = ioarray[q+1];
					}
					cburst[ioarray[a]] = (int)(Math.random()*cburst[a])+1;
					ioburst[ioarray[a]] = (int)(Math.random()*ioburst[a])+1;
					rd.insert(cburst[ioarray[a]], ioarray[a]); // 랜덤값만들어서 다시 레디큐로
				}
			}
		}
	}
	
	public void IOinsert(int i){
		ioarray[rear] = ioburst[i];
		rear++;
		if(rear >= num)
			rear --;
	}
}